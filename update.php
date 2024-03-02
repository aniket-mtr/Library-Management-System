<?php
    session_start();
     $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
     $db =mysqli_select_db($connection, 'lms_main');
     $id = $_SESSION['id'];
     $query = "UPDATE `users` set
                             `email` = '$_POST[email]',
                             `name` = '$_POST[name]',
                             `mobile` = '$_POST[mobile]'
                             WHERE id = '".$id."'";
     $query_run = mysqli_query($connection, $query);
?>

<script type="text/javascripts">
    alert("Updated Successfully!");
    window.location.href = 'user_dashboard.php';
</script>
