<?php

include("connect.php");
include("functions.php");
//echo "Kumari JUHI";

if(logged_in())
{
    header("location: profile.php");
    exit();
}

$error = "";

if(isset($_POST['submit']))
{
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];

    //images 
    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    
    $conditions = isset($_POST['conditions']);
    
    if($password !== $passwordConfirm)
    {
        echo $error = "Password doesnot match";
    }
  
        $insertQuery = "INSERT INTO `users`(`firstName`,`lastName`, `email`, `password`, `image`) VALUES('$firstName', '$lastName', '$email', '$password', '$image')";

        if(mysqli_query($con, $insertQuery)){
            if(move_uploaded_file($tmp_image,"C:/xampp/htdocs/Login Registration System/images/$image"))
                {
                    $error = "You are successfully registered!";
                }
            else
                {
                   echo $error = "Image is not uploaded!";
                }
            }
    
    else if(email_exists($email, $con)){
         echo $error = "This email is already registered!";
    }
    
    else if(!$conditions)
    {
        echo $error = "You must agree with the terms and conditions!";
    }   
}

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Registration Page</title>
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
       <div id = "error" class="alert alert-success"><?php echo $error; ?></div>
        <div id="wrapper">
           <div id = "menu">
<!--
              <button class = "btn btn-info"><a href = "index.php">Sign Up</a></button>
               <button class = "btn btn-success"><a href = "login.php">Login</a></button>
-->
<div class="ui-group-buttons">
                <a href="sign.php" class="btn btn-info" role="button"><span class="glyphicon glyphicon-ok"></span> Sign Up</a>
                <div class="or"></div>
                <a href="login.php" class="btn btn-success" role="button"><span class="glyphicon glyphicon-remove"></span> Login</a>
            </div>
           </div>
           <div class="row">
               <div class="col-lg-4">
                  <div class="book">
                   <img src="http://icons.iconarchive.com/icons/ramotion/custom-mac-os/256/Address-book-icon.png">
                   </div>
               </div>
               <div class="col-lg-8">
            <div id="formDiv">
                <form method="post" action="sign.php" enctype="multipart/form-data">
                    <label>First Name:</label><br />
                    <input type="text" name="fname" maxlength="8" required /><br /><br />
                    <label>Last Name:</label><br />
                    <input type="text" name="lname" maxlength="8" required /><br /><br />
                    <label>Email:</label><br />
                    <input type="email" name="email" required /><br /><br />
                    <label>Password:</label><br />
                    <input type="password" name="password" maxlength="8" required /><br /><br />
                    <label>Re-enter Password:</label><br />
                    <input type="password" name="passwordConfirm" maxlength="8" required /><br /><br />
                    <label>Image:</label><br />
                    <input type="file" name="image" required /><br /><br /> 
                    <input type="checkbox" name="conditions"/>
                    
                     <label>I agree with Terms and Conditions</label><br /><br />
                    <input type="submit" name="submit" class="btn btn-info" />
                </form>
            </div>
            </div>
           </div>
        </div>
</div>
    </body>
        </html>
