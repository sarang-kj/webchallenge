<?php

$con = mysqli_connect("localhost", "root", "", "final") or die(mysqli_error($con));

$first_name = $_POST['username'];
$mail = $_POST['email'];
$passc=$_POST['pass2'];

$passw = $_POST['password1'];
$gen=$_POST['gender'];

$select_query = "SELECT name,email FROM users WHERE email= '$mail' ";
$select_query_result = mysqli_query($con, $select_query) or die(mysqli_error($con));
$row = mysqli_fetch_array($select_query_result);


if($row['email']==$mail)
   {

     header('Location:../error/email.php');

    
   }  

else if($passc!=$passw)
{

  header('Location:../error/confirm.php');

}
else
{

 $user_registration_query = "insert into users(email,name,password,gender) values('$mail','$first_name','$passw','$gen')";
 $user_registration_submit = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
 
 header('Location:../pages/thanku.php');

}

?>   


