<?php

require("connection.php");

$id=$_GET['id'];
$sql = "delete from users where id=$id";
$res = mysqli_query($con,$sql);
if (!$res) {
  echo "Failed : " . mysqli_error( $con );
} else {
  header("Location: index.php?msg=User Deleted Successfully !");
}