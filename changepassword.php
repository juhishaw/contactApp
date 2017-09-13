<?php

include("connect.php");
include("functions.php");


$error = "";
if(isset($_POST['savepass']))
{
    $password = $_POST['password'];
    $passwordConfirm = $_POST['passwordConfirm'];
    
    if($password !== $passwordConfirm)
    {
        echo $error = "Password doesnot match";
    }
    else
    {
        $password = $password;
            $email = $_SESSION['email'];
            if(mysqli_query($con, "UPDATE users SET password = '$password' WHERE email = '$email'"))
            {
                $error = "Password changed successfully,<a href = 'profile.php'> click here</a> to go to the profile";
            }
    }
}


    if(logged_in())
    {
         
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Reset Password</title>
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
          <div id = "error1" class="alert alert-danger"><?php echo $error; ?></div>
           <div id="wrapper1">
           <div class="row">
               <div class="col-lg-4">
                  <div class="book1">
                   <img src="http://ifmanashville.org/wp-content/uploads/2016/02/footer-pass-300x191.png">
                   </div>
               </div>
               <div class="col-lg-1">
               </div>
               <div class="col-lg-7">
       <div id="formDiv1">
    <form method="post" action = "changepassword.php">
    <fieldset>
    <label>New Password:</label><br />
    <input type="password" name="password" maxlength="8" required /><br /><br />
    <label>Re-enter Password:</label><br />
    <input type="password" name="passwordConfirm" maxlength="8" required /><br /><br />
    
    <input type="submit" class = "btn btn-warning" name="savepass" />
    </fieldset>
    </form>
        </div>
               </div>
               </div>
    </div>
       </div>
    </body>
    </html>
    


    <?php
    }
else
{
    header("location:profile.php");
    
}

?>
