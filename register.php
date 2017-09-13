<?php

include("connect.php");
include("functions.php");
//echo "Kumari JUHI";

$email=$_SESSION['email'];

//if(logged_in())
//{
//    header("location: profile.php");
//    exit();
//}

$error = "";

if(isset($_POST['submit']))
{
    $firstName = @$_POST['fname'];
    $lastName = @$_POST['lname'];
    $phone = @$_POST['phone'];
    $email = @$_POST['email'];
    $address = @$_POST['address'];
    $pincode = @$_POST['pincode'];

          $insert = "INSERT INTO `data`(`firstName`,`lastName`, `phone`, `email`, `address`, `pincode`) VALUES('$firstName', '$lastName', '$phone', '$email', '$address', '$pincode')";
 
    
   $result=mysqli_query($con,$insert);
    if(isset($result)){
echo "Successful";
echo "<script>alert('Contact Successfully Added');location.href='register.php';</script>";
}

else {
echo "ERROR";
}
   
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New User</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="./css/style1.css" rel="stylesheet">
</head>
<body>
   <div class="container">
    <form method="post" action="register.php">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="form">
                <div class="title text-center">
                User Registration
                </div>
                <div class="form-div">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text" name="fname" required placeholder="Robin">
                            </div>
                        </div>  
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input type="text" name="lname" required placeholder="DSouza">
                            </div>
                           
                </div>
                    </div>  
            </div>
                <div class="form-div">
                    <div class="row"> 
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="name">Phone Number</label>
                                <input type="text" name="phone" required pattern="^[789]\d{9}$" maxlength="10" placeholder="981*******">
                            </div>
                        </div>
                    </div>   
                </div>
                <div class="form-div">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="name">Email Id</label>
                                <input type="text" name="email" required pattern="^[a-zA-Z0-9._]*[@][a-zA-Z]{3,7}[.][a-zA-Z]{2,3}$" placeholder="xyz@abc.com">
                                
                            </div> 
                        </div>
                    </div>   
                </div>
               <div class="form-div">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                                <label for="address" class="label-control">Address</label>
                                <input type="text" name="address" required placeholder="City, State, Country">
                            </div> 
                            
                        </div>  
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="name">Pincode</label>
                                <input type="text" name="pincode" required placeholder="pincode" pattern="\d{6}">
                            </div>
                             
                        </div>
                    </div>   
                </div>
                <div class="button">
                <div class="row">
                    <div class="col-sm-4">
                <input type="submit" name="submit" class="btn btn-success col-xs-12" value="Submit">
                    </div>
                   <!-- <div class="col-sm-4">
                <button type="submit" class="btn btn-warning col-xs-12">Reset</button>
                    </div>
                    <div class="col-sm-4">
                <button type="submit" class="btn btn-danger col-xs-12">Cancel</button>
                    </div>-->
                </div>
                </div>
            </div>
        </div>
    </div>
    </form>
    </div>
</body>
</html>