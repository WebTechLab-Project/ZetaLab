<?php
echo '<script>alert("logout successful")</script>';
$servername = "localhost";
$username = "root";
$password = "reha";
$dbname = "web_zelab";
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_query($conn, "UPDATE curr_user SET id = -1 ") or die('query failed 3');
echo "<script>console.log('user logout successful!');
window.location.href='index.html';</script>";
?>