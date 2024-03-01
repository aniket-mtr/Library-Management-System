<?php
    $connection = mysqli_connect('localhost', 'root', '', 'lms_main') or die('connection failed');
    $dp =mysqli_select_db($connection, 'lms_main');
    $query = "INSERT INTO `users` VALUES (NULL, '$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[mobile]')";
    $query_run = mysqli_query($connection, $query);
?>
<script type="text/javascript">
    alert("Registered Successfully!.....You may login now.")
    window.location.href = 'login.php';
</script>