-- quick_storage.sql
-- Minimal database bootstrap for this project
-- Import into your MySQL/MariaDB database (e.g., plexaur)

-- Table: courses (used by pages/ethical-hacking.php and admin/course-update.php)
CREATE TABLE IF NOT EXISTS courses (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  link VARCHAR(500) NOT NULL,
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: feedback (used by pages/submit_feedback.php and admin/feedback-view.php)
CREATE TABLE IF NOT EXISTS feedback (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(120) NOT NULL DEFAULT 'Anonymous',
  email VARCHAR(190) DEFAULT NULL,
  category VARCHAR(50) NOT NULL DEFAULT 'general',
  rating TINYINT UNSIGNED NOT NULL,
  message TEXT NOT NULL,
  user_ip VARCHAR(45) DEFAULT NULL,
  timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  CHECK (rating BETWEEN 1 AND 5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table: ip_addresses (used by assets/components/log_visit.php)
CREATE TABLE IF NOT EXISTS ip_addresses (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  ip_address VARCHAR(45) NOT NULL,
  timestamp DATETIME NOT NULL,
  page_title VARCHAR(255) DEFAULT 'Unknown Page'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
