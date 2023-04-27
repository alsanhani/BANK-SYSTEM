<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <title>BLOOD BANK</title>
  <link rel="stylesheet" href="../assets/css/maicons.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">
  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">
  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
  
<body>

    <div class="back-to-top"></div>
<?php
require 'HD.php';?>
  
<?php require 'side a.php';?>
  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="E.U.php"> modification</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create a use</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Create a user</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <!-- البداية -->
  
  
<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM users WHERE id=:id';
$statement1 = $connection->prepare($sql);
$statement1->execute([':id' => $id ]);
$person = $statement1->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['fname']) ) {
  $fname = $_POST['fname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $gender= $_POST['gender'];
  $sql = 'UPDATE users SET fname=:fname, username=:username, password=:password, gender=:gender WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fname' => $fname, ':username' => $username, ':password' => $password, ':gender' => $gender, ':id' => $id])) {
    echo "<script>alert('data EDIT successfully');</script>";
  }
}


 ?>

 <div class="container">

  <div class="card mt-5">
    <div class="card-header">
      <h2>Update User</h2>
    </div>
    <div class="card-body">
      
	  
      <form method="post">
        <div class="form-group">
          <label for="fname"> Name</label>
          <input value="<?= $person->fname; ?>" type="text" name="fname" id="fname" class="form-control">
        </div>
        <div class="form-group">
          <label for="lname">username</label>
          <input value="<?= $person->username; ?>" type="text" name="username" id="lname" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">password</label>
          <input type="text" value="<?= $person->password; ?>" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="gender">Gender</label>
          <input type="radio" name="gender" value="female" <?php if($person->gender=="female"){ echo "checked";}?>>Female
          <input type="radio" name="gender" value="male" <?php if($person->gender=="male"){ echo "checked";}?>>Male
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update User</button>
        </div>
      </form>
    </div>
  </div>
</div>

 
 
 <!-- مساحة  -->
  <div class="maps-container wow fadeInUp">
    <div id="google-maps"></div>
  </div>
<!-- .banner-home -->

  <?php
require 'FT.php';?>
<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
<?php
require 'db.php';
if (isset ($_POST['fname'])  ) {
  $fname = $_POST['fname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $sql = 'INSERT INTO users(fname, username, password, gender) VALUES(:fname, :username, :password, :gender)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fname' => $fname, ':username' => $password, ':gender' => $gender])) {
    $message = 'data inserted successfully';
  }
}?>
 

</html>

