<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>BLOOD BANCK</title>
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

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="E.d.php">The donor</a></li>
            <li class="breadcrumb-item active" aria-current="page">Update donor</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Update donor</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <!-- البداية -->
  
  
<?php
require 'db.php';
$id = $_GET['id'];
$sql = 'SELECT * FROM donor WHERE id=:id';
$statement1 = $connection->prepare($sql);
$statement1->execute([':id' => $id ]);
$person = $statement1->fetch(PDO::FETCH_OBJ);
if (isset ($_POST['fname']) ) {
  $fname = $_POST['fname'];
  $ld = $_POST['ld'];
  $bo = $_POST['bo'];
  $bq = $_POST['bq'];
  $gend= $_POST['gend'];
  $sql = 'UPDATE donor SET oname=:fname, OLD=:ld, bg=:bq, BLOODG=:bo, GENDER=:gend WHERE id=:id';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':fname' => $fname, ':ld' => $ld, ':bq' => $bq, ':bo' => $bo, ':gend' => $gend, ':id' => $id])) {
    header("Location: E.d.php");
  }
}


 ?>

<div >
  <div class="card mt-5">
    <div class="card-header">
      <h2>Update donor</h2>
    </div>
    <div class="card-body">
     
      <form method="post">
        <div class="form-group">
          <label for="fname"> Name</label>
          <input value="<?= $person->oname; ?>" type="text" name="fname" id="fname" class="form-control">
        </div>
        <div class="form-group">
          <label for="lname">OLD</label>
          <input value="<?= $person->OLD; ?>" type="text" name="ld" id="lname" class="form-control">
        </div>
		 <div class="form-group">
          <label for="fname"> Quantity</label>
          <input value="<?= $person->bg; ?>" type="text" name="bq" id="fname" class="form-control">
        </div>
		<div class="form-group">
          <label for="fname"> BLOOD GROUP<</label>
          <input value="<?= $person->BLOODG; ?>" type="text" name="bo" id="fname" class="form-control">
        </div>
		
        <div class="form-group">
          <label for="gender">GENDER</label>
          <input type="radio" name="gend" value="female" <?php if($person->GENDER=="female"){ echo "checked";}?>>Female
          <input type="radio" name="gend" value="male" <?php if($person->GENDER=="male"){ echo "checked";}?>>Male
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Update donor</button>
        </div>
      </form>
    </div>
  </div>
</div>

 
 
 
 

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  <?php require 'FT.php'; ?>
</body>

 

</html>

