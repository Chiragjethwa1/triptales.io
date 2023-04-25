<?php

function check_login($conn) 
{
    
    if (isset($_SESSION['userid']))
    {
        $id = $_SESSION['userid'];
        $query = "select * from tourist where userid = '$id' limit 1";

        $result = mysqli_query($conn, $query);
        if($result && mysqli_num_rows($result) > 0)
        {
             
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
        //redirect to login
        header("location:login.php");
        die;
    }
}

function check_booked($conn)
{
    if(isset($_POST["submit3"])){
        echo "<script>alert('Congratulations, You have successfully booked this trip.')</script>;";
        header("location: booknow.php");
    }

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

?>