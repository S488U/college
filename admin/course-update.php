<?php
include("../dbconnection/connection.php");

if (isset($_POST["submit"])) {
    $title = $_POST["title"];
    $description = $_POST["description"];
    $link = $_POST["link"];

    $stmt = $conn->prepare("INSERT INTO courses (title, description, link) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $link);
    $stmt->execute();

    echo "Course added successfully";

    $stmt->close();
}

// Check if delete button is clicked
if(isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM courses WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $delete_id);
    $stmt->execute();
    echo "Course deleted successfully";
    $stmt->close();
}

?>

<div class="container-sm flex flex-column  justify-content-center align-items-center">
    <form method="post" class="form mx-auto border border-dark p-md-4 p-1 py-5 rounded">
        <h1 class="text-center text-capitalize p-3">Course Update Section</h1>
        <div class="d-flex flex-column  m-1">
            <label for="">Course Title: </label>
            <input class="form-control border border-dark rounded" type="text" name="title" id="">
        </div>
        <div class="d-flex flex-column m-1">
            <label for="">Course Description: </label>
            <textarea class="form-control border border-dark rounded" type="text" name="description" id=""></textarea>
        </div>
        <div class="d-flex flex-column m-1">
            <label for="">Course Link: </label>
            <input class="form-control border border-dark rounded" type="text" name="link" id="" placeholder="https://example.com/">
        </div>
        <div class="d-flex flex-row m-1 py-4 gap-2">
            <input class="btn btn-danger flex-fill" type="reset" value="Reset">
            <input class="btn btn-dark flex-fill" name="submit" type="submit" value="Submit">
        </div>
    </form>

    <div class="container flex flex-column  justify-content-center align-items-center my-5">
    <?php 
    $sql = "SELECT * FROM courses";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo '<div class="d-flex flex-column bg-dark-subtle m-3 p-2 px-4 rounded">';
            echo '<h4 class="m-0 p-0">' . $row["title"]. '</h4>';
            echo '<p class="m-0 p-0">' . $row["description"]. '</p>';
            echo '<p class="m-0 p-0">Link: <span> <a href=' . $row["link"]. '>' . $row["link"]. '</a></span></p>';
            echo '<p class="m-0 p-0">Timestamp: ' . $row["timestamp"]. '</p>';
            echo '<a href="?delete_id=' . $row["id"] . '" class="btn btn-danger">Delete</a>';
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    ?>
    </div>
</div>

<style>
    input:focus,
    textarea:focus {
        box-shadow: none !important;
        outline: none !important;
    }
</style>
