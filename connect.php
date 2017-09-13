<?php

    $con = mysqli_connect("localhost","root","", "registration");

if(mysqli_connect_errno())
   {
        echo "There is an error while connecting to the database".mysqli_connect_errno();
    }
session_start();


?>