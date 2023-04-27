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
            <li class="breadcrumb-item"><a href="C.d.php">Add a donor</a></li>
            <li class="breadcrumb-item active" aria-current="page">The donors</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">The donors</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <!-- البداية -->
  
  
 <?php
require 'db.php';
$sql = 'SELECT * FROM donor';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      
	  <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <h3>The donors</h3>
            </div>
            
          </div>
        </form>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>FULL NAME</th>
          <th>OLD</th>
          <th>EMAIL</th>
		  <th>GENDER</th>
		  <th>Quantity </th>
		  <th>PHONE </th>
		  <th>BLOOD GROUP </th>
		  <th>Edit </th>
		  <th>Delete</th>
          
         
         
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->oname; ?></td>
            <td><?= $person->OLD; ?></td>
            <td><?= $person->EMAIL; ?></td>
            <td><?= $person->GENDER; ?></td>
            <td><?= $person->bg; ?></td>
            <td><?= $person->PHOEN; ?></td>
            <td><?= $person->BLOODG; ?></td>
          
			
         
            <td>
              <a href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              
            </td>
			<td>
              
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
	  <a onclick="return confirm('Are you sure you want to evacuation the data?')" href="delete all.php" class='btn btn-danger'>evacuation</a>
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