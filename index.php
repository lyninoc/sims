<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="styles.css">  <!-- Link the new CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <h1>📚 Student Management System</h1>

        <!-- Add Student Form -->
        <div class="card">
            <h2>Add Student</h2>
            <form action="insert.php" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="number" name="age" placeholder="Age" required>
                <button type="submit" class="btn-primary">Add</button>
            </form>
        </div>

        <!-- Student List -->
        <div class="card">
            <h2>Student List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once "connect.php";
                    $sql_query = "SELECT * FROM students";
                    $result = $con->query($sql_query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['age']}</td>
                                    <td><a href='edit.php?id={$row['id']}' class='edit-btn'>✏️ Edit</a></td>
                                    <td><a href='delete.php?id={$row['id']}' class='delete-btn'>🗑 Delete</a></td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center py-2'>No students found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
