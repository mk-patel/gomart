<?php
// This is a Database Connection code.
$conn = mysqli_connect("sql209.epizy.com", "epiz_28852462", "lLhfrQ2D2n", "epiz_28852462_gomart_4866");
$mysqli = new mysqli("sql209.epizy.com", "epiz_28852462", "lLhfrQ2D2n", "epiz_28852462_gomart_4866");

// when the connection fails then error message will be printed.
if(!$conn){
die("Connection Failed, Please Try Again !!".mysqli_connect_error());
}
?>