<?php
require_once "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch student data
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = $con->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
    } else {
        echo "<script>alert('Student not found!'); window.location.href='index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('Invalid request!'); window.location.href='index.php';</script>";
    exit;
}

// Delete student when confirmed
if (isset($_POST['delete'])) {
    $delete_query = "DELETE FROM students WHERE id = $id";

    if ($con->query($delete_query)) {
        echo "<script>alert('Student deleted successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error deleting student: " . $con->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-danger text-white">
                <h3>Confirm Delete</h3>
            </div>
            <div class="card-body text-center">
                <p class="fs-5">Are you sure you want to delete <strong><?php echo $name; ?></strong>?</p>
                
                <form method="POST">
                    <a href="index.php" class="btn btn-secondary">Cancel</a>
                    <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
