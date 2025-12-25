<?php
// DB Connection - Use relative if absolute fails locally
$dbPath = "../config/db.php";
if(file_exists($dbPath)) include $dbPath;
else include "../assets/components/db.php"; 

// Handle Submit
if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $link = $_POST["link"];

    $stmt = $conn->prepare("INSERT INTO courses (title, description, link) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $link);
    
    if($stmt->execute()){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">Course added successfully! <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
    }
    $stmt->close();
}

// Handle Delete
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM courses WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $delete_id);
    if($stmt->execute()){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Course deleted. <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
        // JS Redirect to strip GET param so refresh doesn't re-delete
        echo "<script>if(window.history.replaceState){window.history.replaceState(null, null, window.location.href.split('?')[0]);}</script>";
    }
    $stmt->close();
}
?>

<div class="row g-4">
    <!-- ADD COURSE FORM -->
    <div class="col-lg-4">
        <div class="glass-card p-4">
            <h4 class="mb-4 text-white"><i class="fa-solid fa-plus-circle me-2 text-primary"></i>Add New Course</h4>
            
            <form method="post">
                <div class="mb-3">
                    <label class="form-label text-gray small">Course Title</label>
                    <input class="form-control" type="text" name="title" required placeholder="e.g. Ethical Hacking 101">
                </div>
                <div class="mb-3">
                    <label class="form-label text-gray small">Description</label>
                    <textarea class="form-control" name="description" rows="4" required placeholder="Short brief..."></textarea>
                </div>
                <div class="mb-4">
                    <label class="form-label text-gray small">External Link</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-secondary text-gray"><i class="fa-solid fa-link"></i></span>
                        <input class="form-control" type="url" name="link" required placeholder="https://">
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">Publish Course</button>
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                </div>
            </form>
        </div>
    </div>

    <!-- COURSE LIST -->
    <div class="col-lg-8">
        <div class="glass-card p-4">
            <h4 class="mb-4 text-white">Active Courses</h4>
            <div class="table-responsive">
                <table class="table table-dark-glass table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sql = "SELECT * FROM courses ORDER BY timestamp DESC";
                    $result = $conn->query($sql);
                    
                    if ($result && $result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            $shortDesc = substr($row["description"], 0, 50) . (strlen($row["description"]) > 50 ? "..." : "");
                            echo '<tr>';
                            echo '<td class="fw-bold text-white">' . htmlspecialchars($row["title"]) . '</td>';
                            echo '<td class="text-gray small">' . htmlspecialchars($shortDesc) . '</td>';
                            echo '<td class="small text-nowrap">' . date('M d, Y', strtotime($row["timestamp"])) . '</td>';
                            echo '<td class="text-end">
                                    <div class="btn-group">
                                        <a href="' . htmlspecialchars($row["link"]) . '" style="margin: 0 8px;" target="_blank" class="btn btn-sm btn-outline-info" title="Visit Link"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                        <a href="?delete_id=' . $row["id"] . '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Are you sure you want to delete this course?\')" title="Delete"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                  </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="4" class="text-center py-4 text-muted">No courses found.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>