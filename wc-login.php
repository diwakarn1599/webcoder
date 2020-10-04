<?php
session_start();
$err = "";
if(isset($_SESSION['uname']))
{
    header("Location: WebCoder.php");
}

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $mail = $_POST['email'];
    $pwd = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE email = '$mail'";
    $res = mysqli_query($conn,$query);
    if(mysqli_num_rows($res) !=1)
    {
        $err.="Email id is not found";
    }
    else
    {

               $row = mysqli_fetch_assoc($res);

                if($pwd != $row['password']) {
                    $err.="Email or password is incorrect";
                } else {


                    $_SESSION['uname'] = $row['uname'];
                    $_SESSION['mail'] = $row['email'];
                    header("Location: WebCoder.php");
                    exit();
                }
    }
   

}
?>







<!DOCTYPE html>
<html>
<head>
	<title>Web Coder</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style type="text/css">
    	.container
    	{
    		width:350px;
    		margin-top: 150px;
            border-radius: 15px;
    		border: 2px solid #343a40;
            padding: 20px;

    	}
    	body
    	{
    		background-color: #D3D3D3;
    	}

    </style>

</head>
<body>

	<nav class="navbar navbar-expand-lg fixed-top  navbar-dark bg-dark" id="navbar">
  			<a class="navbar-brand" href="#">Webcoder</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
		</nav>



	<div class="container">


            <div><?php if($err)
            {
                echo '<div class="alert alert-warning" role="alert">'.$err.'</div>';
            } ?>
                
            </div>
	<form method="POST" id="signupform">
			
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" name = "email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
		  </div>

		  <div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
		  </div>
  <p style="text-align: center;margin-top: 10px;"><button type="submit" class="btn btn-success" >Login</button></p>

  <p style="text-align: center;margin-top: 10px;">New User? <a href="wc-signup.php" style="cursor: pointer; text-decoration: none;">Sign Up</a></p>

</form>


</div>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>