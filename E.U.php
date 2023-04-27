<?php
require 'db.php';
$sql = 'SELECT * FROM users';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
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
<?php require 'side a.php';?>


  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="C.U.php">Create a use</a></li>
            <li class="breadcrumb-item active" aria-current="page">modification</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">The users</h1>
      </div> 
    </div> 
  </div> 

<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>All</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Full Name</th>
          <th>username</th>
         
          <th>Gender</th>
        </tr>
        <?php foreach($people as $person): ?>
          <tr>
            <td><?= $person->id; ?></td>
            <td><?= $person->fname; ?></td>
            <td><?= $person->username; ?></td>
            
            <td><?= $person->gender; ?></td>
            <td>
              <a href="edit - Copy.php?id=<?= $person->id ?>" class="btn btn-info">Edit</a>
              <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete - Copy.php?id=<?= $person->id ?>" class='btn btn-danger'>Delete</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>


 
 
 <!-- مساحة  -->
  <div class="maps-container wow fadeInUp">
    <div id="google-maps"></div>
  </div>
<?php require 'FT.php';?>



<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>


</html>