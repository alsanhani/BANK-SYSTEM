<?php
require 'db.php';
// $message = '';
// define variables and set to empty values
$username  = $password = $password1 = "";
if (isset ($_POST['submit'])) {
  
  
  if (empty($_POST['fname'])){
    echo "<script>alert('Please enter the fname');</script>";
  }
  if (empty($_POST['gender'])){
    echo "<script>alert('Please enter the gender');</script>";
  }
  if (empty($_POST['username'])){
    echo "<script>alert('Please enter the username');</script>";
  }
    
    if (empty($_POST['t'])){
    echo "<script>alert('Please enter the type');</script>";
  }
    elseif(empty($_POST['password'])){
      echo "<script>alert('Please enter the password');</script>";
    }
	
    else{
		
		
		
	  $gender =valid_input($_POST['gender']);
      $fname =$_POST['fname'];
      $username =valid_input($_POST['username']);
      $t =valid_input($_POST['t']);
      $password =valid_input($_POST['password']);
      $password1 =valid_input($_POST['password']);
      if ($password=$password1){
      $sql = 'INSERT INTO users(username,  password, fname, gender, type)	  VALUES(:username,  :password, :fname, :gender, :t )';
      $statement = $connection->prepare($sql);
      if ($statement->execute([':username' => $username,  ':password' => md5($password), 'fname' => $fname, 'gender' => $gender, ':t' => $t])) {
        echo "<script>alert('data inserted successfully');</script>";
    }
  }
  }
}
function valid_input($data){
  $data=trim($data);
  $data=stripcslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
 ?>
 
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

  <!-- Back to top button -->
  <div class="back-to-top"></div>
<?php
require 'HD.php';?>
  
<?php
require 'side a.php';?>
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
  
  
  <div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Create a user</h2>
    </div>
    <div class="card-body">
      
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fname">Full Name</label>
          <input type="text" name="fname" id="fname" class="form-control">
        </div>
        <div class="form-group">
          <label for="lname">user Name</label>
          <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">password</label>
          <input type="text" name="password" id="password" class="form-control">
        </div>
		
		<div class="form-group">
          <label for="password">Confirm Password</label>
          <input type="text" name="password" id="password" class="form-control">
        </div>
		  <div class="form-group" >
          <label for="gender">type</label><br>
          <input type="radio" name="t" value="0" >user
          <input type="radio" name="t" value="1">admian
        </div>
        <div class="form-group" >
          <label for="gender">Gender</label><br>
          <input type="radio" name="gender" value="emale" >Female
          <input type="radio" name="gender" value="male">Male
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-info">Create a user</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
 
 
 
  <?php
require 'FT.php';?>


<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/js/theme.js"></script>
</body>

 

</html>