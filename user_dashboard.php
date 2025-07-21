<?php
    session_start();

    // Function to retrieve the count of books issued by the currently logged-in user
    function get_user_issue_book_count(){
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $user_issue_book_count = 0;
        $query = "SELECT COUNT(*) AS user_issue_book_count FROM issued_books WHERE student_id = $_SESSION[id]";
        $query_run = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query_run)){
            $user_issue_book_count = $row['user_issue_book_count'];
        }
        return $user_issue_book_count;
    }

    // Function to search for books by name
    function search_books($search_query) {
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $books = array();
        $query = "SELECT * FROM books WHERE book_name LIKE '%$search_query%'";
        $query_run = mysqli_query($connection,$query);
        while ($row = mysqli_fetch_assoc($query_run)){
            $books[] = $row;
        }
        return $books;
    }

    // Function to reserve a book
    function reserve_book($student_id, $book_id) {
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"lms");
        $issue_date = date('Y-m-d H:i:s');
        $query = "INSERT INTO issued_books (book_no, student_id, status, issue_date) VALUES ('$book_id', '$student_id', '1', '$issue_date')";
        $query_run = mysqli_query($connection, $query);
        if($query_run) {
            echo '<script>alert("Book reserved successfully!");</script>';
        } else {
            echo '<script>alert("Failed to reserve the book!");</script>';
        }
    }

    // Check if the reserve book request is made
    if(isset($_GET['reserve_book'])) {
        $book_id = $_GET['reserve_book'];
        reserve_book($_SESSION['id'], $book_id);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="admin_dashboard.php">Library Management System (LMS)</a>
            </div>
            <font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name'];?></strong></span></font>
            <font style="color: white"><span><strong>Email: <?php echo $_SESSION['email'];?></strong></font>
            <ul class="nav navbar-nav navbar-right">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="view_profile.php">View Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="edit_profile.php">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="change_password.php">Change Password</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>
            </ul>
        </div>
    </nav><br>
    <span><marquee>This is library management system. Library opens at 8:00 AM and closes at 6:00 PM</marquee></span><br><br>
    <div class="row">
        <div class="col-md-3" style="margin: 25px">
            <div class="card bg-light" style="width: 300px">
                <div class="card-header">Book Issued</div>
                <div class="card-body">
                    <p class="card-text">No. of books issued: <?php echo get_user_issue_book_count(); ?></p>
                    <a class="btn btn-success" href="view_issued_book.php">View Issued Books</a>
                </div>
            </div>
        </div>
        <div class="col-md-3" style="margin: 25px">
            <div class="card bg-light" style="width: 300px">
                <div class="card-header">Search Books</div>
                
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="search_query">Search Query:</label>
                            <input type="text" class="form-control" id="search_query" name="search_query">
                        </div>
                        <button type="submit" class="btn btn-primary" name="search_books">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        if(isset($_POST['search_books']) && !empty($_POST['search_query'])) {
            $search_query = $_POST['search_query'];
            $search_result = search_books($search_query);
            if(count($search_result) > 0) {
                echo "<h3>Search Results:</h3>";
                foreach($search_result as $book) {
                    echo "<p>{$book['book_name']} by {$book['author_id']} <a href='user_dashboard.php?reserve_book={$book['book_id']}'>Reserve</a></p>";
                }
            } else {
                echo "<p>No books found matching the search query.</p>";
            }
        }
    ?>
</body>
</html>
