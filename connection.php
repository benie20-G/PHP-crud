<?php 
$servername='127.0.0.1';
$username='root';
$dbname='student_db';
$password='';
$conn=mysqli_connect($servername,$username,$password,$dbname);

// if($conn->connect_error){
if(!$conn){
echo "connection failed!!";
}
?>