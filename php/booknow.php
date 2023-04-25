<?php
  session_start();
 
  include("conn.php");
  include("functions.php");

  $user_data = check_login($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style2.css">
  <title>Book now</title>
  
  <script>
  function message1() {
			var message = "Congratulations, You have successfully booked the pakage.";
			alert(message);
			setTimeout(function() {
				window.location.href = "booknow.php";
			}, 5000);
		}
    function message2() {
			var message = "Congratulations, You have successfully edited the password and email.";
			alert(message);
			setTimeout(function() {
				window.location.href = "booknow.php";
			}, 5000);
		}
</script>
 

</head>
<body class="page">
  
  <section class="header">
    <div class="scroll">
    <nav>
        <a href="index.html">
          <!--<img src="logo.png" alt="" width="170px" height="80px"></a>-->
            <div class="nav-links">
              <ul>
                  <li><a href="index.html" target="_blank">Website</a></li>
                  <li><a href="#form">Book now</a></li>
                  <li><a href="#edit">Edit info</a></li>
                  <li><a href="logout.php" onclick="disableBack()">Log out</a></li>
                </ul> 
            </div> 
  </nav>
  

  </section>

    <section class="username"><h1><?php echo '@'.$user_data['username'];?></h1></section>

      <section id="form">

        <form enctype="multipart/form-data" method="POST" action="form.php">

          <a href="#home" id="cross2">X</a>

         
          <input type="email" name="email" placeholder="Email id" required> <br><br>
          
          <label>Package: </label>
          <select name="package" id="placeholder" required>
                  <option selected hidden>Select</option>
                  <option value="Goa">Goa</option>
                  <option value="Rajasthan">Rajasthan</option>
                  <option value="Rishikesh">Rishikesh</option>
                  <option value="Leh Ladakh">Leh Ladakh</option>
          </select> <br><br>
          
          <label>Departure Date:</label> 
          <input type="date" name="departure_date" min="2023-05-14" max="2023-05-20" required> <br><br>
          <lable>Return Date:</lable> 
          <input type="date" name="return_date" min="2023-05-23" max="2023-05-30" required> <br><br>    
        
          <label>Payment Method:<br> </label> 
          <input type="radio" name="payment_method" value="Credit/Debit" required> Credit/Debit <input type="radio" name="payment_method" value="NetBanking"> NetBanking <input type="radio" name="payment_method" value="PayPal"> PayPal  <br><br>    
          
          <label>Gender: </label>
          <input type="radio" name="gender" value="M"> Male <input type="radio" name="gender" value="F" required> Female<br><br>    
          
          
          <input type="number" name="number_of_members" placeholder="Number of members" value="f" required> <br><br>    
          
          <textarea cols="30" rows="5" placeholder="Tell us about your Medical Conditions if you have any." name="medical_conditions"></textarea> <br><br>    
          
          <input type="checkbox" required>
          <label>I accept all the Terms and Conditions.</label>  <br><br>   
          
          <input type="submit" onclick="message1()" name="submit2" value="Confirm" id="size2"> 
          <input type="reset" id="size2"> <br><br>  
    
          <p>&copy; Trip Tales, All rights reserved.</p>
        
        </form>  
      </section>

        <section id="edit">
      <!-- Edit password, email -->
          <form method="POST" action="form.php">

            <a href="#home" id="cross">X</a>
            
        <input type="password" name="password3" placeholder="New Password" id="size" required> <br><br>
            
             
            <input type="email" name="email3" placeholder="New Email id" id="size"> <br><br>

          <input type="submit" onclick="message2()" name="submit3" value="Confirm" id ="size2" onclick="s2()"> 
          

          </form>
        </section>  
        <script>
        window.history.forward();
        function disableBack(){
          window.history.forward();
        }
      </script>

</body>
</html>