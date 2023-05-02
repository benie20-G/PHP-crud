
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
<style>
    nav{
        background-color: lightblue;
    }
</style>
<body>
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



    <a href="signup.php" class="btn btn-dark">Add New</a>
    <a href="generate_pdf.php" class="btn btn-info">PDF</a>
<table class="table table_hover text-center">
  <thead class="table_dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
require 'connection.php';
$sql="SELECT *FROM users";
$results=mysqli_query($conn,$sql);
while($users=mysqli_fetch_assoc($results)){

?>
    <tr>
    <td><?php echo $users['id'] ?></td>
  <td><?php echo $users['fname'] ?></td>
  <td><?php echo $users['lname'] ?></td>
  <td><?php echo $users['email'] ?></td>
  <td><?php echo $users['gender'] ?></td>
  <td>
    <a href='edit.php?id=<?php echo $users['id'] ?>' class="link-dark">Edit</a>
  <a href='delete.php?id=<?php echo $users['id'] ?>' class="link-dark">Delete</a>
</td>
  </tr>
  <?php
}
  ?>
  </tbody>
</table>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
</body>
</html>
