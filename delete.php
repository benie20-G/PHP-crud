<?php
include 'connection.php';
$id=$_GET['id'];


$sql="DELETE FROM `users` WHERE id=$id";
$results=mysqli_query($conn,$sql);
if($results){
header("Location:index.php?msg=User Deleted");
}
else{
    echo "Failed" .mysqli_error($conn);
}
?>