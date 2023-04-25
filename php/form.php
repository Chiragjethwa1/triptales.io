<?php 
session_start();

include("conn.php");
include("functions.php");

$user_data = check_login($conn);


//insert data in form
if(isset($_POST["submit2"])) {

  $username8 = $user_data['username'];
  $password8 = $user_data['password'];
  $email = $_POST['email'];
  $package = $_POST['package'];
  $departure_date = $_POST['departure_date'];
  $return_date = $_POST['return_date'];
  $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
  $number_of_members = $_POST['number_of_members'];
  $medical_conditions = $_POST['medical_conditions'];
  $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
 
  $sql = "UPDATE tourist SET email=?, package=?, departure_date=?, return_date=?, payment_method=?, gender=?, number_of_members=?, medical_conditions=?
  WHERE username=? AND password=?";
  
  $stmt = mysqli_prepare($conn, $sql);
  
  mysqli_stmt_bind_param($stmt, "ssssssisss", $email, $package, $departure_date, $return_date, $payment_method, $gender, $number_of_members, $medical_conditions, $username8, $password8);
 
 if (mysqli_stmt_execute($stmt)) {
      header("location: booknow.php");
 } else {
     echo "<script>alert('Error inserting data.');</script>";

 }  
}

// edit data in form
if(isset($_POST["submit3"])) {

  $username9 = $user_data['username'];
  $new_password = $_POST['password3'];
  $email = $_POST['email3'];


  $sql = "UPDATE tourist SET email=?, password=? WHERE username=?";  

$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "sss", $email, $new_password, $username9);

if (mysqli_stmt_execute($stmt)) {
    echo "<script>alert('Data updated successfully.');</script>";
    header("location: booknow.php");
} else {
    echo "<script>alert('Error updating data. Try again.');</script>";
}
}




?>