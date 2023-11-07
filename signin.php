<?php
$servername = "localhost";
$username = "root";
$password = "reha";
$dbname = "web_zelab";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['submit_l'])){
   $email = mysqli_real_escape_string($conn, $_POST['email_l']);
   $pass = mysqli_real_escape_string($conn, $_POST['password_l']);

    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$pass'") or die('query failed');

    if(mysqli_num_rows($select_user) > 0){
        while($fetch_users = mysqli_fetch_assoc($select_user))
        {
            $id = $fetch_users['id'];
            mysqli_query($conn, "UPDATE curr_user SET id = '$id' ") or die('query failed 3');
        }
        echo "<script>console.log('user login successful!');
        window.location.href='index_session.html';</script>";
    }
    else
    {
        echo "<script>alert('invalid email or password!');
        console.log('invalid email or password!');
        window.location.href='Signupin.html';</script>";
    }
}
?>