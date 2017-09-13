<?php

include("connect.php");
include("functions.php");

    if(logged_in())
    {
       
   
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Forgot</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="./css/style1.css" rel="stylesheet">
    </head>

    <body>
        <h1>Address Book</h1><br />
        <div id="header">
            <a href="logout.php">Log Out</a>
            <a href="changepassword.php">Change Password</a>
        </div>
        <br />
        <br />
        <hr>
        <br /><br /><br />
        <div class="container">
           <form action="register.php" method="get">
            <input type="submit" class="btn btn-warning pull-right" value="Add Contacts">
            </form>

            <br />
            <br />
            <table class="table">
                <thead>
                    <tr>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Handlers</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Default</td>
                        <td>Defaultson</td>
                        <td>def@somemail.com</td>
                        <td>Delhi</td>
                        <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a>

                            <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a>
                            <a href="#" class="btn btn-success btn-xs" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">
                                <span class="glyphicon glyphicon-heart-empty"></span> View
                            </a>

                                
                        

                        </td>
                    </tr>
                 
                </tbody>
            </table>
        </div>



        <?php
         }
else
{
    header("location:login.php");
    exit();
}

?>

    </body>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
    </html>
