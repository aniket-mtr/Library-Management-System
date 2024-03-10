<?php
  require('functions.php');
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <title>Issue Books</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System</a>
			</div>
        <font style="color : white"><span><strong><?php echo "WELCOME: ".$_SESSION['name']; ?></strong></span></font>
		    <ul class="nav navbar-nav navbar-right">
		      <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown toggle" data-toggle = "dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a href="view_profile.php" class="dropdown-item">View Profile</a>
                        <a href="edit_profile.php" class="dropdown-item">Edit Profile</a>
                        <a href="change_password.php" class="dropdown-item">Change Password</a>
                    </div>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">Logout</a>
              </li>
		    </ul>
		</div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
      <div class="container-fluid">
        <ul class="nav navbar-nav navbar-center">
          <li class="nav-item">
            <a href="admin_dashboard.php" class="nav-link">Dashboard</a>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Books</a>
            <div class="dropdown-menu">
              <a href="add_book.php" class="dropdown-item">Add New Book</a>
              <a href="manage_book.php" class="dropdown-item">Manage Books</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Categories</a>
            <div class="dropdown-menu">
              <a href="add_category.php" class="dropdown-item">Add New Category</a>
              <!-- <a href="" class="dropdown-item">Manage Categories</a> -->
            </div>
          </li>
          <li class="nav-item dropdown">
            <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">Authors</a>
            <div class="dropdown-menu">
              <a href="add_author.php" class="dropdown-item">Add New Authors</a>
              <!-- <a href="" class="dropdown-item">Manage Authors</a> -->
            </div>
          </li>
          <!-- <li class="nav-item">
            <a href="admin_dashboard.php" class="nav-link">Issue Books</a>
          </li> -->
        </ul>
      </div>
    </nav><br>

    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="book_name">Name of Book: </label>
                    <input type="text" class="form-control" name="book_name" required>
                </div>
                <div class="form-group">
                    <label for="author_name">Name of Author: </label>
                   <select name="book_author" id="" class="form-control">
                        <option>-Select Author-</option>
                        <?php
                            $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
                            $db =mysqli_select_db($connection, 'lms_main');
                            $email = $_POST['email'];
                            $query = "SELECT `author_name` FROM `authors`;";
                            $query_run = mysqli_query($connection, $query);
                            while($row=mysqli_fetch_assoc($query_run))
                            {
                                ?>
                                <option><?php echo $row['author_name']; ?></option>
                                <?php
                            }
                        ?>
                   </select>
                </div>
                <div class="form-group">
                    <label for="isbn">Book ISBN: </label>
                    <input type="text" class="form-control" name="isbn" required>
                </div>
                <div class="form-group">
                    <label for="id">User ID: </label>
                    <input type="text" class="form-control" name="id" required>
                </div>
                <div class="form-group">
                    <label for="issue_date">Issue Date: </label>
                    <input type="text" class="form-control" name="issue_date" value="<?php echo date('d-m-y')?>" required>
                </div>
                <center><button class="btn btn-primary" type="submit">Issue Book</button></center>
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
    
</body>
</html>