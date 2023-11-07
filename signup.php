<?php
$servername = "localhost";
$username = "root";
$password = "reha";
$dbname = "web_zelab";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, $_POST['password']);
   $cpass = mysqli_real_escape_string($conn, $_POST['cpassword']);
   if (!filter_var($email, FILTER_VALIDATE_EMAIL))
   {
      $message='invalid email!';
      echo "<script>alert('$message');
      console.log('$message');
      window.location.href='Signupin.html';</script>";
   }
   else
   {
      if(empty($name))
      {
         $message='empty username not allowed!';
         echo "<script>alert('$message');
         console.log('$message');
         window.location.href='Signupin.html';</script>";
      }
      else
      {
         if(empty($pass))
         {
            $message='empty password not allowed!';
            echo "<script>alert('$message');
            console.log('$message');
            window.location.href='Signupin.html';</script>";
         }
         else
         {
            $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

            if(mysqli_num_rows($select_users) > 0){
               $message = 'user email already registered!';
               echo "<script>alert('$message');
               console.log('$message');
               window.location.href='Signupin.html';</script>";
            }else{
               if($pass != $cpass){
                  $message = 'confirm password does not match!';
                  echo "<script>alert('$message');
                  console.log('$message');
                  window.location.href='Signupin.html';</script>";
               }else{
                  mysqli_query($conn, "INSERT INTO `users`(name, email, password) VALUES('$name', '$email', '$cpass')") or die('query failed');
                  $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');
                  while($fetch_users = mysqli_fetch_assoc($select_user))
                  {
                     $id = $fetch_users['id'];
                     mysqli_query($conn, "UPDATE curr_user SET id = '$id' ") or die('query failed 3');
                  }
                  echo "<script> console.log('signed in successfully!');
                  window.location.href='index_session.html';</script>";
               }
            }
         }
      }
   }
}
?>