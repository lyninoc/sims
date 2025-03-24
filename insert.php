<?php
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $con->real_escape_string($_POST['name']);
    $email = $con->real_escape_string($_POST['email']);
    $age = (int)$_POST['age'];

    $sql = "INSERT INTO students (name, email, age) VALUES ('$name', '$email', $age)";
    if ($con->query($sql)) {
        echo "<script>alert('Student added successfully!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error: " . $con->error . "');</script>";
    }
}
?>
