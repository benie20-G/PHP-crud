<?php
    include 'connection.php';
    $id=$_GET['id'];

    if(isset($_POST['submit'])){
        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $email=$_POST['email'];
        $gender=$_POST['gender'];
        $password=sha1($_POST['password']);


        $sql="UPDATE `users` SET `fname`='$firstname', 
        `gender`='$gender',
        `lname`='$lastname',`email`='$email',
        `password`='$password' WHERE `id`=$id";

        $results=mysqli_query($conn,$sql);

        if($results){
header('location:index.php?msg=User updated successfully');
        }
        else{
            echo mysqli_error($conn);
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
</style>
<nav class="navbar navbar-light justify-content-center fs-3 mb-5">
    PHP CRUD APPLICATION
</nav>

<div class="container">
    <div class="text-center mb-4">
        <h3><b>Edit user</b></h3>
    </div>

    <?php
    require 'connection.php';

$sql="SELECT * FROM users WHERE id=$id LIMIT 1";
$results= mysqli_query($conn,$sql);
$data= mysqli_fetch_assoc($results);
    ?>



<div class="container d-flex justify-content-center">
    <form action="" method="POST"  style="width:50vw; min-height:300px;" class="horizantal-form">
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">First name:</label>
            <input type="text" class="form-control" name="firstname"
            value="<?php echo $data['fname'] ?>">
            <div class="col">
                <label class="form-label">Last name:</label>
            <input type="text" class="form-control" name="lastname"
            value="<?php echo $data['lname'] ?>"
            >
            <div class="col-xs-6">
                <label class="form-label">Email:</label>
            <input type="email" class="form-control" name="email"
            value="<?php echo $data['email'] ?>">
            
            <div class="col">
                <label class="form-label">Password:</label>
            <input type="password" class="form-control" name="password" value="123" >
        

            <div class="form-group mb-3">
                <label for="Gender">Gender</label>
           
            <input type="radio" class="form-check-input" name="gender"
            value="male" id="male" <?php echo ($data['gender']=='male' )?"checked":"";?>>
            <label class="form-label">Male</label> 

            <input type="radio" class="form-check-input" name="gender" id="female"
            value="female" <?php echo ($data['gender']=='female' )?"checked":"";?>>
            <label class="form-label">Female</label>
            </div>
        </div>
        </div>
        <div>
    <button type="submit" class="btn btn-success" name="submit"> Update</button>
    <a href="index.php" class="btn btn-danger">Cancel</a>
</div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
</body>
</html>