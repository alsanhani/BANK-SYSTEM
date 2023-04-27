<?php include_once 'session.php';?>

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
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <?php require 'HD.php';?>
<?php require 'side.php';?>

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="E.D.php">the donor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add a donor</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Add a donor</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <!-- البداية -->
  
  
  <div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add a donor</h2>
    </div>
    <div class="card-body">
      
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fname">FULL NAME</label>
          <input type="text" name="name" id="fname" class="form-control">
        </div>
        <div class="form-group">
          <label for="lname">OLD</label>
          <input type="number" name="LD" id="OLD" class="form-control">
        </div>
		<div class="form-group">
          <label for="email">EMAIL</label>
          <input type="EMAIL" name="MAIL" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="email">BLOOD Q </label>
          <input type="number" name="Qbg" id="bg" class="form-control">
        </div>
		<div class="form-group">
          <label for="BLOOD GROUP">BLOOD GROUP</label>
		  <br>
          <input type="radio" name="BLOOD" value="A+">A+ &nbsp; 
          <input type="radio" name="BLOOD" value="A-">A-  &nbsp;
		  <input type="radio" name="BLOOD" value="B+">B+ &nbsp;
          <input type="radio" name="BLOOD" value="B-">B- &nbsp;
		  <input type="radio" name="BLOOD" value="AB+">AB+ &nbsp;
          <input type="radio" name="BLOOD" value="AB-">AB- &nbsp;
		  <input type="radio" name="BLOOD" value="O+">O+ &nbsp;
          <input type="radio" name="BLOOD" value="O-">O- &nbsp;
        </div>
		 <div class="form-group">
          <label for="email">PHOEN</label>
          <input type="number" name="HOEN" id="email" class="form-control">
        </div>
		<div class="form-group">
          <label for="email">ADDRESS</label>
          <input type="text" name="ADDRES" id="ADDRESS" class="form-control">
        </div>
        <div class="form-group">
          <label for="gender">GENDER</label>
		  <br>
          <input type="radio" name="ENDER" value="female">female		  
          <input type="radio" name="ENDER" value="male">male
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-info">Create a donor</button>
        </div>
      </form>
    </div>
  </div>
</div>
 
 

 <?php require 'FT.php';?>
   

<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>
<script src="../assets/vendor/wow/wow.min.js"></script>
<script src="../assets/js/theme.js"></script>
  
</body>
<?php
require 'db.php';

$oname  = $EMAIL =  "";
if (isset ($_POST['submit'])) {
  
  
  if (empty($_POST['name'])){
    echo "<script>alert('Please enter the name');</script>";
  }
  if (empty($_POST['ENDER'])){
    echo "<script>alert('Please enter the gender');</script>";
  }
  if (empty($_POST['LD'])){
    echo "<script>alert('Please enter the OLD');</script>";
  }
  if (empty($_POST['Qbg'])){
    echo "<script>alert('Please enter the BLOOD Q');</script>";
  }  
  if (empty($_POST['HOEN'])){
    echo "<script>alert('Please enter the PHOEN');</script>";
  }
  if (empty($_POST['ADDRES'])){
    echo "<script>alert('Please enter the ADDRESS');</script>";
  }
  if (empty($_POST['BLOOD'])){
    echo "<script>alert('Please enter the BLOOD GROUP');</script>";
  }
    elseif(empty($_POST['MAIL'])){
      echo "<script>alert('Please enter the EMAIL');</script>";
    }
	
				
    else{
		
		
		
	  $ENDER =valid_input($_POST['ENDER']);
      $name =$_POST['name'];
      $MAIL =valid_input($_POST['MAIL']);
      $LD =valid_input($_POST['LD']);
      $Qbg =valid_input($_POST['Qbg']);
	  $HOEN =valid_input($_POST['HOEN']);
      $ADDRES =valid_input($_POST['ADDRES']);
      $BLOOD =valid_input($_POST['BLOOD']);
      $sql = 'INSERT INTO donor(oname,  EMAIL, GENDER, OLD, bg, PHOEN, ADDRESS, BLOODG)	  VALUES(:name,  :MAIL, :ENDER ,:LD, :Qbg, :HOEN, :ADDRES, :BLOOD)';
      $statement = $connection->prepare($sql);
      if ($statement->execute([':name' => $name,  ':MAIL' => $MAIL, 'ENDER' => $ENDER, 'LD' => $LD, ':Qbg' => $Qbg, ':HOEN' => $HOEN, ':ADDRES' => $ADDRES, ':BLOOD' => $BLOOD])) {
        echo "<script>alert('data inserted successfully');</script>";
    }
	$sq = 'update keep set bloodq = bloodq+:Qbg where bloodset=:BLOOD ';
      $st = $connection->prepare($sq);
	  $st->execute([ ':BLOOD' => $BLOOD, ':Qbg' => $Qbg]);
	
  }
  }

function valid_input($data){
  $data=trim($data);
  $data=stripcslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
 ?>



</html>