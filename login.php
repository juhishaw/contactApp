<?php

include("connect.php");
include("functions.php");
$error = "";
if(logged_in())
{
    header("location: profile.php");
    exit();
}

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkBox = isset($_POST['keep']);
    
    
    if(email_exists($email, $con)){
       $result = mysqli_query($con, "SELECT password FROM users WHERE email = '$email'");
        $retreivepassword = mysqli_fetch_assoc($result);
        
        if($password != $retreivepassword['password'])
        {
             $error = "Password doesn't match";
        }
        else {
            $_SESSION['email'] = $email;
            
            if($checkBox == "on")
            {
                setcookie("email", $email, time()+3600);
            }
            
            header("location: profile.php");
        }
    }
    else{
        $error = "Email doesnot exists";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <link href="./css/styles.css" rel="stylesheet">
</head>
<body>
  <div class="container">
   <div id = "error" class="alert alert-danger"><?php echo $error; ?></div>
    <div id="wrapper">
           <div id = "menu">
              <div class="ui-group-buttons">
                <a href="sign.php" class="btn btn-info" role="button"><span class="glyphicon glyphicon-ok"></span> Sign Up</a>
                <div class="or"></div>
                <a href="login.php" class="btn btn-success" role="button"><span class="glyphicon glyphicon-remove"></span> Login</a>
            </div>
           </div>
            <div id="formDiv">
                <form method="post" action="login.php">
                    
                    <label>Email:</label><br />
                    <input type="text" name="email" required /><br /><br />
                    <label>Password:</label><br />
                    <input type="password" name="password" required /><br /><br />
                     <input type="checkbox" name="keep"/>
                    
                     <label>Remember me:</label><br /><br />
                     
                    <input type="submit" name="submit" value = "Login" class="btn btn-success" />
                </form>
            </div>
        </div>
        </div>
</body>
</html>