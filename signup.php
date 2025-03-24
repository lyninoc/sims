<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h3 class="text-center mb-4">Sign Up Here</h3>
                    <form action="" method="POST"> <!-- Leave action empty to submit to the same page -->
                        <div class="mb-3">
                            <label for="firstname" class="form-label">Firstname</label>
                            <input type="text" class="form-control" id="firstname" name="fname" placeholder="Enter your first name" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lname" placeholder="Enter your last name" required>
                        </div>
                        <div class="mb-3">
                            <label for="age" class="form-label">Age</label>
                            <input type="number" class="form-control" id="age" name="age" placeholder="Enter your age" required min="1">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="•••••" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" name="submit">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
require_once 'connect.php'; 

if (isset($_POST['submit'])) { // Corrected '$_post' to '$_POST'
    // Use '$_POST' instead of '$_post' (case-sensitive)
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : ''; // Get the password from the form

    // Prepare the SQL statement
    $insert = "INSERT INTO student_information (fname, lname, age, gender, password) VALUES ('$fname', '$lname', '$age', '$gender', '$password')"; // Corrected table name

    // Execute the query
    $query = mysqli_query($con, $insert);

    if ($query) {
        header('Location: index.php'); // Redirect on success
        exit(); // It's a good practice to call exit after header redirection
    } else {
        echo "<script>alert('Failed to register: " . mysqli_error($con) . "')</script>"; // Show error message
    }
}
?>