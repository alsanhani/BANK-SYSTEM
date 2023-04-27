<?php
 require 'db.php';
  if (isset ($_POST['submit']) ) {
	  
	 $sq = 'update Request set type = 1  where ide=:num ';
     $st = $connection->prepare($sq);
	 $st->execute([':num' => $_POST["chang"]]);
	 $W='select   bloodq from keep where bloodset=:BLOO ';
	 $st = $connection->prepare($W);
     $m=$st->execute([ ':BLOO' => $_POST["b"]]);
	 //$m= $n->fetch(PDO::FETCH_NUM);
	 echo $m[0];
	 if($m[0] < $_POST["q"]){
	 $sql = 'update keep set bloodq=bloodq-:QU where bloodset=:BLOO ';
      $st = $connection->prepare($sql);
	  $st->execute([ ':BLOO' => $_POST["b"], ':QU' => $_POST["q"]]);
	  echo "<script>alert('data  inserted ');</script>";
	 }
	 else echo "<script>alert('data didnot inserted ');</script>";
			 }
			 

$sql = 'SELECT * FROM Request where type=0';
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
  <title>BANK BLOOD</title>
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
            <li class="breadcrumb-item"><a href="E.R .D.php">Delivered Requests</a></li>
            <li class="breadcrumb-item active" aria-current="page">The Requests</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">The Requests</h1>
      </div> 
    </div> 
  </div> 


<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      
	  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
          <div class="input-group input-navbar">
            <h3>The Requests</h3>
          </div>
        </form>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>NAME OF Patient</th>
          <th>BLOOD GROUP</th>
          <th>Quantity</th>
		  <th>PHONE </th>
		  <th>ADDRESS</th>
		  <th>DAHE</th>
		  <th>GENDER</th>
          <th>Delivery</th>
        </tr>
        <?php foreach($people as $person): ?>
		 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
          <tr>
		  <td><?= $person->ide;  ?></td>
            <td><?= $person->Patient; ?></td>
            <td><?= $person->BLOODGQ; ?></td>
			<input type="hidden" name="b" value="<?php echo $person->BLOODGQ;?>">
            <td><?= $person->QUB; ?></td>
			<input type="hidden" name="q" value="<?php echo $person->QUB;?>">
            <td><?= $person->PHOEP; ?></td>
            <td><?= $person->ADDRESSP; ?></td>
			<td><?= $person->DAHEP; ?></td>
			<td><?= $person->gendP; ?></td>
            <td><button type="submit" name="submit" class="btn btn-info">Delivery</button>
			<input type="hidden" name="chang" value="<?php echo $person->ide;?>">
             </td>
          </tr>
		  </form>
        <?php endforeach; ?>
      </table>
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