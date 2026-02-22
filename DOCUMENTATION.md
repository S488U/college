# DOCUMENTATION.md

## Project Overview
This repository contains two things in one codebase:
1. A PHP web application (`plexaur.com` / SU Study Materials portal) that serves course pages, searchable files, viewer pages, upload/admin tools, and a sandboxed PHP compiler.
2. A large academic content archive (BCA, MCA, IBM folders) containing study materials, code labs, records, PDFs, docs, slides, and sample programs.

The app is built in plain PHP + Bootstrap + JS with Apache rewrite-based routing.

## Bottom-Up Walkthrough (How It Works)

### 1. Raw Content Layer (data files)
Primary academic content directories:
- `BCA/`
- `MCA/`
- `IBM/`

These folders hold the actual study assets: `pdf`, `doc/docx`, `ppt/pptx`, `c/cpp`, `java`, `py`, `html`, images, etc. The folder explorer pages and search endpoint index these files.

### 2. Storage/Generated Layer
- `uploads/`: user-contributed archives uploaded from `pages/upload.php` (zip/rar).
- `output/allFiles/`: generated temporary PHP files created by `output/output.php` for output previews.
- `compiler/temp/`: runtime temp files created by `compiler/run.php` when executing submitted PHP snippets.

### 3. Configuration and Environment Layer
- `.env` (project root): runtime environment variables.
- `composer.json`: dependency management.
- `config/db.php`: DB bootstrap using `vlucas/phpdotenv` + `mysqli`.
- `load_env.php`: debug utility to verify env loading.

### 4. Shared UI/Component Layer
- `assets/components/navbar.php`, `footer.php`, `scripts.php`
- `assets/components/checkApprove.php`: consent UI (LocalStorage + async log call).
- `assets/components/log_visit.php`: records visits to DB (expects DB include path).
- `assets/style/*`, `assets/theme/*`, `assets/script/*`, `assets/fonts/*`, `assets/svg/*`, `assets/images/*`

### 5. Feature/Route Layer (`pages/`)
- `pages/bca.php`, `mca.php`, `ibm.php`: folder explorer wrappers; include respective `*/index.php` explorer renderers.
- `pages/view.php`: secure viewer (only `/BCA|/MCA|/IBM`), supports PDF/doc/docx/ppt/code rendering and download.
- `pages/search.php`: recursive file search + ranking + blocking rules.
- `pages/upload.php`: multi-file archive upload (`zip`,`rar`, max 64MB each).
- `pages/feedback.php`: feedback form UI.
- `pages/submit_feedback.php`: JSON POST endpoint for feedback insert.
- `pages/ethical-hacking.php`: DB-driven course cards (`courses` table).
- `pages/admin.php`: admin dashboard wrapper (courses/uploads/feedback tabs).
- `pages/compiler.php`: compiler UI page embedding CodeMirror + terminal.
- `pages/about.php`, `pages/error.php`, `pages/loading.php`, `pages/g-tag.php`

### 6. Admin/Operations Layer
- `admin/course-update.php`: create/delete `courses` rows.
- `admin/upload-shows.php`: list/download/delete files in `uploads/`.
- `admin/feedback-view.php`: list/delete `feedback` rows.
- `output/output.php`: sanitizes program source, writes temporary executable copies.
- `output/auto_deletion.php`: currently empty.

### 7. Compiler Runtime Layer
- `compiler/index.php`: editor/output UI component.
- `compiler/run.php`: POST endpoint running validated PHP in temp file, with blocked function/token checks and runtime limits.

### 8. App Entry/Routing Layer
- `index.php`: home page (course cards + search box + UI).
- `.htaccess`: central routing/security.
  - allows `dumbcli/install.sh|ps1`
  - blocks risky extensions elsewhere (`.sh`, `.ps1`, `.env`, `.sql`, etc.)
  - pretty URLs (`/pages/bca` style)
  - front controller fallback to `index.php`
  - custom 403/404 => `pages/error.php`

## Tech Stack
- Backend: PHP (procedural style + mysqli)
- DB: MySQL/MariaDB (via `mysqli`)
- Dependency: `vlucas/phpdotenv` (Composer)
- Frontend: Bootstrap 5, Font Awesome, custom CSS/JS
- Viewer helpers: Prism.js, Mammoth.js, Google Docs embed for some formats
- Server assumptions: Apache with `mod_rewrite`, `DOCUMENT_ROOT` mapped to repo root

## Dependency and Runtime Requirements
- PHP 8.x recommended (7.4+ likely works for most parts)
- PHP extensions: `mysqli`, `json`, `mbstring`, `tokenizer` (compiler validator uses token parsing)
- Apache + `mod_rewrite`
- Composer
- MySQL/MariaDB for DB-backed features

## Environment Variables (`.env` at project root)
Detected keys used by code:
- `MODE` (`production` or development-like value)
- `DB_HOST`
- `DB_USER`
- `DB_PASS`
- `DB_NAME`

`config/db.php` behavior:
- loads env via Dotenv
- toggles error visibility/reporting based on `MODE`
- creates `$conn = new mysqli(...)`

## Database Usage (Inferred from Queries)
Tables referenced in code:
- `courses` (used by ethical hacking + admin CRUD)
  - fields referenced: `id`, `title`, `description`, `link`, `timestamp`
- `feedback` (feedback submission + admin listing)
  - fields referenced: `id`, `name`, `email`, `category`, `rating`, `message`, `user_ip`, and `timestamp` or `created_at`
- `ip_addresses` (visit logging)
  - fields referenced: `ip_address`, `timestamp`, `page_title`

## Search and File Visibility Rules
`pages/search.php`:
- scans recursively from `$_SERVER['DOCUMENT_ROOT']`
- blocks many directories (`assets`, `vendor`, `.git`, `pages`, `admin`, `compiler`, `output`, etc.)
- blocks risky/system extensions (`sql`, `env`, `log`, `obj`, `exe`, `cbp`, etc.)
- scores matches by keyword/semester relevance
- returns top 50 JSON paths

## Viewer Rules
`pages/view.php`:
- requires `?file=` path
- hard-validates allowed prefix regex: only `/BCA/...`, `/MCA/...`, `/IBM/...`
- protects against browsing outside academic directories
- chooses preview strategy by extension:
  - `pdf` => iframe
  - `docx` => Mammoth conversion in browser
  - `ppt/pptx/doc` => Google docs viewer embed
  - code/text-like files => syntax-highlighted render

## Upload and Admin Behavior
- `pages/upload.php`: accepts multiple files, extensions `zip|rar`, max 64MB/file, stores in `uploads/`.
- `admin/upload-shows.php`: can hard-delete uploaded files via `unlink`.
- Admin routes currently have no authentication middleware in code.

## Compiler Security Model
`compiler/run.php`:
- executes user-submitted PHP with restrictive validator
- blocks dangerous functions (`exec`, `system`, `shell_exec`, file/fs/network/process functions, etc.)
- blocks dangerous language constructs (`eval`, `require/include`, `global`, backticks)
- executes through generated temp file in `compiler/temp/`
- hard limits: short max execution time + memory cap

## Additional Site/SEO/Utility Files
- `robots.txt`: disallows crawling core content and sensitive routes, allows selected routes.
- `sitemap.xml`: lists public pages.
- `dumbcli/`: public installer docs and shell/PowerShell installer scripts for a separate CLI tool.

## File-Type Footprint (High-Level)
Largest file types in repo (count):
- `pdf` (268)
- `php` (131)
- `cpp` (109)
- `docx` (45)
- `java` (28)
- `html` (26)
- plus many binaries/artifacts from lab/codeblocks outputs (`.exe`, `.o`, `.obj`, etc.)

## Local Setup
1. Install dependencies:
```bash
composer install
```
2. Create `.env` in project root with DB values.
3. Ensure DB/tables exist (`courses`, `feedback`, `ip_addresses`).
4. Ensure writable folders:
- `uploads/`
- `output/allFiles/`
- `compiler/temp/` (created automatically by compiler if permissions allow)
5. Serve via Apache (or PHP server with equivalent routing, but `.htaccess` behavior expects Apache).

## Notes and Caveats
- `.gitignore` excludes `.env`, `vendor/`, `uploads/`, `output/allFiles/`, and some generated/binary paths.
- `output/auto_deletion.php` is currently empty.
- Some scripts use fallback DB include paths (`assets/components/db.php`) that may not exist in this repo; primary DB path is `config/db.php`.
- Admin and destructive file operations are not protected by visible auth checks.

