<?php
echo "<script>console.log('67')</script>";
$servername = "localhost";
$username = "root";
$password = "reha";
$dbname = "web_zelab";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$idlist = mysqli_query($conn,"SELECT id FROM curr_user");
while($fetch_id = mysqli_fetch_assoc($idlist))
{
    $id = $fetch_id['id'];
}
$a=mysqli_real_escape_string($conn, $_POST['str']);
$r=mysqli_real_escape_string($conn, $_POST['res']);
mysqli_query($conn, "INSERT INTO `history`(id,action,value) values ($id,'$a','$r')") or die('query failed 3');
echo "<script>console.log('history stored!');
history.back();</script>";
?>