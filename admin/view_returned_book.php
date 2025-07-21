<?php
// Include necessary files and start session
require("functions.php");
session_start();

// Define the function to get returned books
function get_returned_books() {
    // Here you should implement the logic to fetch returned books from your database
    // For demonstration, I'll provide a sample array of returned books
    return array(
        array('id' => 1, 'title' => 'Book 1', 'author' => 'Author 1', 'category' => 'Category 1'),
        array('id' => 2, 'title' => 'Book 2', 'author' => 'Author 2', 'category' => 'Category 2'),
        array('id' => 3, 'title' => 'Book 3', 'author' => 'Author 3', 'category' => 'Category 3')
    );
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Returned Books</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap-4.4.1/css/bootstrap.min.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            My Profile
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="view_profile.php">View Profile</a>
                            <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                            <a class="dropdown-item" href="change_password.php">Change Password</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h1>View Returned Books</h1>
        <div class="row mt-4">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Category</th>
                            <!-- Add more columns as needed -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            // Fetch and display returned books from the database
                            $returned_books = get_returned_books();
                            foreach ($returned_books as $book) {
                                echo "<tr>";
                                echo "<td>{$book['id']}</td>";
                                echo "<td>{$book['title']}</td>";
                                echo "<td>{$book['author']}</td>";
                                echo "<td>{$book['category']}</td>";
                                // Add more columns as needed
                                echo "</tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
