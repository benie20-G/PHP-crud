<?php
    include 'connection.php';
    if(isset($_POST['submit'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $password=sha1($_POST['password']);
        // $password=md5($_POST['password']);
        $gender=$_POST['gender'];
        $sql="INSERT INTO users(fname,lname,email,password,gender) VALUES('$firstname','$lastname','$email','$password','$gender')";
        $result=$conn->query($sql);
    
        if($result){
            // echo 'Error:' .$sql. '<br>' .$conn->error;(
            header('location:index.php?msg=New record created successfully');
        }
    
        $conn->close();
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
</style>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5">
    PHP CRUD APPLICATION
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h3>Add user</h3>
        <p class="text-muted">complete the form below</p>
    </div>
    
<div class="container d-flex justify-content-center">
<form action="" method="post" style="width:50vw; min-height:300px;" class="horizantal-form">
<div class="form-group">
      <label class="control-label col-sm-2" for="email">First Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Eg: Benie" name="firstname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Last Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control"  placeholder="Eg: GIRAMATA" name="laststname">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">Email:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control"  placeholder="Eg: Ineza@gmail.com" name="email">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2">password:</label>
      <div class="col-sm-10">
        <input type="password" class="form-control"  placeholder="password" name="password">
      </div>
    </div>

<div class="form-group mb-3">
<label class="form-label">Gender</label><br>
        <input type="radio" class="form-check-input" name="gender" value="male">
        <label class="form-label">Male</label>
        <input type="radio" class="form-check-input" name="gender" value="female">
        <label class="form-label">Female</label>
</div>

<div>
    <button type="submit" class="btn btn-success" name="submit"> Save</button>
    <a href="index.php" class="btn btn-danger">Cancel</a>
</div>

</form>

</div>

</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
</body>
</html>