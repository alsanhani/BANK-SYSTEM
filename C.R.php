<?php
require 'db.php';
if (isset ($_POST['submit'])) {
   
  if (empty($_POST['atient'])){
    echo "<script>alert('Please enter the name');</script>";
  }
  if (empty($_POST['BLOO'])){
    echo "<script>alert('Please enter the BLOOD GROUP');</script>";
  }
  if (empty($_POST['QU'])){
    echo "<script>alert('Please enter the Quantity');</script>";
  }
  if (empty($_POST['PHOE'])){
    echo "<script>alert('Please enter the PHOEN');</script>";
  }  
  if (empty($_POST['ADDRE'])){
    echo "<script>alert('Please enter the ADDRESS');</script>";
  }
  if (empty($_POST['DAH'])){
    echo "<script>alert('Please enter the DAHE');</script>";
  }
  
    elseif(empty($_POST['gend'])){
      echo "<script>alert('Please enter the gender');</script>";
    }
	
  
    else{
	
	  $atient =$_POST['atient'];
      $BLOO =valid_input($_POST['BLOO']);
      $QU =valid_input($_POST['QU']);
      $PHOE =valid_input($_POST['PHOE']);
      $ADDRE =valid_input($_POST['ADDRE']);
	  $DAH =valid_input($_POST['DAH']);
      $gend =valid_input($_POST['gend']);
	  
      $sql = 'INSERT INTO Request(Patient,  BLOODGQ, QUB, PHOEP, ADDRESSP, DAHEP, gendP)	
	  VALUES(:atient,  :BLOO, :QU ,:PHOE, :ADDRE, :DAH, :gend)';	  
      $statement = $connection->prepare($sql);  
      if ($statement->execute([':atient' => $atient,  ':BLOO' => $BLOO, 'QU' => $QU, 'PHOE' => $PHOE, ':ADDRE' => $ADDRE, ':DAH' => $DAH, ':gend' => $gend])) {
        echo "<script>alert('data inserted successfully');</script>";
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
            <li class="breadcrumb-item"><a href="E.R.php"> Request</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add a Request</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Add a Request  </h1>
      </div> 
    </div> 
  </div> 
 
  <div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add a Request</h2>
    </div>
    <div class="card-body">
        
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fname">FULL NAME OF Patient</label>
          <input type="text" name="atient" id="fname" class="form-control">
        </div>
       
		
        <div class="form-group">
          <label for="BLOOD GROUP">BLOOD GROUP</label>
		  <br>
          <input type="radio" name="BLOO" value="A+">A+ &nbsp; 
          <input type="radio" name="BLOO" value="A-">A-  &nbsp;
		  <input type="radio" name="BLOO" value="B+">B+ &nbsp;
          <input type="radio" name="BLOO" value="B-">B- &nbsp;
		  <input type="radio" name="BLOO" value="AB+">AB+ &nbsp;
          <input type="radio" name="BLOO" value="AB-">AB- &nbsp;
		  <input type="radio" name="BLOO" value="O+">O+ &nbsp;
          <input type="radio" name="BLOO" value="O-">O- &nbsp;
        </div>
		<div class="form-group">
          <label for="email">Quantity</label>
          <input type="number" name="QU" id="QU" class="form-control">
        </div>
		
		 <div class="form-group">
          <label for="email">PHOEN</label>
          <input type="number" name="PHOE" id="email" class="form-control">
        </div>
		<div class="form-group">
          <label for="email">ADDRESS</label>
          <input type="text" name="ADDRE" id="email" class="form-control">
        </div>
		<div class="form-group">
          <label for="email">DAHE</label>
          <input type="date" name="DAH" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="gender">GENDER</label>
		  <br>
          <input type="radio" name="gend" value="female">female
          <input type="radio" name="gend" value="male">male
        </div>
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-info">Add a Request</button>
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


</html>