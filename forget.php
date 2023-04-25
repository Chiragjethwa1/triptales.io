<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css"></link>
    
</head>
<body class="page">
<a href="login.php" style="position: absolute; color: white; width: 100%; margin: auto; padding: 20px;
 box-sizing:border-box; font-size: 18px; text-align: center;">Login</a>
<div id="forgetbox" >
    

      <form enctype="multipart/form-data" method="POST" action="login.php"> 
        <h1 id="loginh1">Set password.</h1>
        
        <a href="#home" id="cross">X</a>

        <input type="text" name="username6" placeholder="Username" id="logininput1" required> <br><br>
  
        <input type="password" name="password6" placeholder="Enter new password" id="logininput2" required> <br><br>
  
        <input type="submit" name="submit6" value="Submit" id="submit1">

        </form>
      </div>

</body>
</html>
