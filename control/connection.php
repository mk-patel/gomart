<?php

// This is a Database Connection code.
$conn = mysqli_connect("localhost", "root", "", "gomart_4866");
$mysqli = new mysqli("localhost", "root", "", "gomart_4866");

// when the connection fails then error message will be printed.
if(!$conn){
    die("Connection Failed, Please Try Again !!".mysqli_connect_error());
}
?>