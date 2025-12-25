<?php
// admin/feedback-view.php

// 1. DB Connection (Reuse existing logic)
$dbPath = "../../components/db.php";
if(file_exists($dbPath)) include_once $dbPath;
else include_once "../assets/components/db.php"; 

// 2. Handle Delete
if(isset($_GET['delete_feedback'])) {
    $del_id = $_GET['delete_feedback'];
    $del_stmt = $conn->prepare("DELETE FROM feedback WHERE id = ?");
    $del_stmt->bind_param("i", $del_id);
    if($del_stmt->execute()){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">Feedback entry deleted. <button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>';
        // Prevent resubmission on refresh
        echo "<script>if(window.history.replaceState){window.history.replaceState(null, null, window.location.href.split('?')[0]);}</script>";
    }
    $del_stmt->close();
}

// Helper: Star Rating Generator
function renderStars($rating) {
    $html = '<div class="text-warning" style="font-size: 0.8rem;">';
    for($i=1; $i<=5; $i++) {
        if($i <= $rating) $html .= '<i class="fa-solid fa-star"></i>';
        else $html .= '<i class="fa-regular fa-star text-muted"></i>';
    }
    $html .= '</div>';
    return $html;
}

// Helper: Category Badge
function renderCategory($cat) {
    $color = 'bg-secondary';
    $icon = 'fa-comment';
    
    switch($cat) {
        case 'bug': $color = 'bg-danger'; $icon = 'fa-bug'; break;
        case 'feature': $color = 'bg-warning text-dark'; $icon = 'fa-lightbulb'; break;
        case 'content': $color = 'bg-info text-dark'; $icon = 'fa-book'; break;
        case 'general': $color = 'bg-success'; $icon = 'fa-comments'; break;
    }
    
    return '<span class="badge '.$color.' rounded-pill"><i class="fa-solid '.$icon.' me-1"></i>'.ucfirst($cat).'</span>';
}
?>

<div class="glass-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text-white m-0"><i class="fa-solid fa-comments me-2 text-info"></i>User Feedback</h4>
    </div>

    <div class="table-responsive">
        <table class="table table-dark-glass align-middle">
            <thead>
                <tr>
                    <th width="15%">Date / User</th>
                    <th width="15%">Type & Rating</th>
                    <th width="60%">Message</th>
                    <th width="10%" class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $f_sql = "SELECT * FROM feedback ORDER BY id DESC";
                $f_result = $conn->query($f_sql);
                
                if ($f_result && $f_result->num_rows > 0) {
                    while($row = $f_result->fetch_assoc()) {
                        $date = date('M d, Y', strtotime($row['timestamp']));
                        $name = htmlspecialchars($row['name']);
                        $email = htmlspecialchars($row['email'] ?? 'No Email');
                        $msg = nl2br(htmlspecialchars($row['message']));
                        
                        echo '<tr>
                                <td>
                                    <div class="fw-bold text-white small">'.$date.'</div>
                                    <div class="text-accent mt-1">'.$name.'</div>
                                    <div class="text-muted small" style="font-size: 0.75rem;">'.$email.'</div>
                                </td>
                                <td>
                                    <div class="mb-1">'.renderCategory($row['category']).'</div>
                                    '.renderStars($row['rating']).'
                                </td>
                                <td class="text-gray small" style="min-width: 300px;">
                                    <div style="max-height: 100px; overflow-y: auto;" class="custom-scrollbar">
                                        '.$msg.'
                                    </div>
                                </td>
                                <td class="text-end">
                                    <a href="?delete_feedback=' . $row["id"] . '" class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm(\'Delete this feedback?\')" title="Delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                              </tr>';
                    }
                } else {
                    echo '<tr><td colspan="4" class="text-center py-5 text-muted">No feedback received yet.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>