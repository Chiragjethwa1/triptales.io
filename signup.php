<?php
    session_start();
    include("conn.php");
    include("functions.php");

 // Sign Up   
if(isset($_POST["submit4"]))
{
  $username3 = $_POST['username4'];
  $password3 = $_POST['password4'];

  
  $stmt10 = mysqli_prepare($conn, "SELECT username from tourist where username = '$username3'");
  mysqli_stmt_execute($stmt10);
  $res = mysqli_stmt_get_result($stmt10);
  $num_rows = mysqli_num_rows($res);
  //check if username exist
  if($num_rows >= 1)
  {
     // Redirect to the desired page
     $redirect_url = "http://localhost/signup.php";
     echo "<script>alert('Username already exists. Set unique username.');window.location.replace('$redirect_url');</script>";

  }
  else 
  {
      if(!empty($username3) && !empty($password3) && !is_numeric($username3))
      {
            $userid = random_num(20);
			$query = "insert into tourist (userid,username,password) values ('$userid','$username3','$password3')";

			mysqli_query($conn, $query);

			header("Location: login.php");
			die;
      }
      else {
        echo "<script>alert('Create unique username. All chacercters should be not numeric.');</script>";
      }
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style2.css">
  <title>Book now</title>
  
</head>
<body class="page">

<a href="Login.php" style="position: absolute; color: white; width: 100%; margin: auto; padding: 20px;
 box-sizing:border-box; font-size: 18px; text-align: center;">Log in</a>

<div id="signup">
      <form method="POST" action="signup.php"> 
        <h1 id="loginh1">Sign Up.</h1>

        <input type="text" name="username4" placeholder="Create Username" id="logininput1" required> <br><br>    

        <input type="password" name="password4" placeholder="Choose Password" id="logininput2" required> <br><br>
        

        <input type="submit" onclick="disableBack()" name="submit4" value="Sign up" id="submit1" >

        </form>
      </div>
      <!--Disable back button-->
      <script>
        window.history.forward();
        function disableBack(){
          window.history.forward();
        }
      </script>
</body>
</html>