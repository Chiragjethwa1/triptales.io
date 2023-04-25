<?php
session_start();
include("conn.php");
include("functions.php");

// login
if(isset($_POST["submit1"])) 
{
  
    $username5 = $_POST['username5'];
    $password5 = $_POST['password5'];
  
    if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		if(!empty($username5) && !empty($password5) && !is_numeric($username5))
		{

			//read from database
			$query = "select * from tourist where username = '$username5' limit 1";
			$result = mysqli_query($conn, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password5)
					{

						$_SESSION['userid'] = $user_data['userid'];
						header("Location: booknow.php");
					}
				}
			}
    
		}
    echo "<script>alert('Wrong credentials. Try again.');</script>";
  }
}

  
  // forget password
  if(isset($_POST['submit6'])){
  
    $username6 = $_POST['username6'];
    $password6 = $_POST['password6'];
  
    $stmt2 = mysqli_prepare($conn, "UPDATE tourist SET password = ? WHERE BINARY username = ?");
    mysqli_stmt_bind_param($stmt2, "ss", $password6, $username6);
    mysqli_stmt_execute($stmt2);
    $res = mysqli_stmt_affected_rows($stmt2);

    if($res > 0 && !empty($username6) && !empty($password6) && !is_numeric($username6) ){
      echo "<script>alert('password set successfully.');</script>";
    }
    else {
      echo "<script>alert('Username or Password is not eligible. Try Again.');</script>";
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

<a href="signup.php" style="position: absolute; color: white; width: 100%; margin: auto; padding: 20px;
 box-sizing:border-box; font-size: 18px; text-align: center;">Sign up</a>

<div id="login">
      <form enctype="multipart/form-data" method="POST" action="login.php"> 
        <h1 id="loginh1">Log in.</h1>

        <input type="text" name="username5" placeholder="Username" id="logininput1" required> <br><br>
  
        <input type="password" name="password5" placeholder="Password" id="logininput2" required> <br><br>
  
        <a href="forget.php" id="forget">forget password?</a> <br><br>
  
        <input type="submit" name="submit1" value="Login" id="submit1" onclick="disableBack()" >

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