<?php
    include 'connection.php';
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=sha1($_POST['password']);
        $sql="SELECT *FROM users WHERE `email`='$email'";
        $result=$conn->query($sql);
        if($result){
        $user_data=mysqli_fetch_assoc($result);
 if ($user_data['email']===$email && $user_data['password']===$password){
    session_start();
$_SESSION['email']=$email;
$_SESSION['password']=$password;
$id=$user_data['id'];

                header('location:index.php?msg=Login successfully');
 }
 else{
    header('Location:login.php?msg=Invalid email or password');
 }
    }else{
echo "Invalid data";
    } 

}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" 
    referrerpolicy="no-referrer" />
</head>

<body>
<style>
    nav{
        background-color: lightblue;
    }
    input{
        border: 3px solid black;
        outline: none;
    }
</style>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5">
    PHP CRUD APPLICATION
</nav>

<div class="container">
<?php 
if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
'.$msg.'
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
    
?>
    <div class="text-center mb-4">
        <h3>Log into you account</h3>
        <p class="text-muted"></p>
    </div>
    
<div class="container d-flex justify-content-center">
<form action="" method="post" style="width:50vw; min-height:300px;" class="horizantal-form">

    <div class="form-group">
      <label class="control-label col-sm-2 mb-2">Email:</label>
      <div class="col-sm-10"> 
        <input type="email" class="form-control mb-5 border border-black"  placeholder="Eg: Ineza@gmail.com" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 mb-2">password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control  mb-5 border border-black"  placeholder="password" name="password">
      </div>
    </div>

<div>
    <button type="submit" class="btn btn-info" name="submit">Login</button>
<span class="text text-muted display-inline">do not have account</span>
    <a href="signup.php" class="link">sign up</a>
</div>

</form>
</div>
</div>
</body>
</html>