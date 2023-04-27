<?php
require 'db.php';
if (isset ($_POST['submit'])) {
	$img_name = $_FILES['image']['name'];
  $img_size = $_FILES['image']['size'];
  $tmp_name = $_FILES['image']['tmp_name'];
  $img_ex_lc = pathinfo($img_name, PATHINFO_EXTENSION);
  $allowed_exs = array("jpg", "jpeg", "png");
   
  if (empty($_POST['News'])){
    echo "<script>alert('Please enter the News');</script>";
  }
  
  elseif ($img_size > 125000) {
			$em = "Sorry, your file is too large.";
		}
  
	
  
    else{
	if (in_array($img_ex_lc, $allowed_exs)) {
				$img_upload_path = 'img/'.$img_name;
				move_uploaded_file($tmp_name, $img_upload_path);
      }
	  
	  
	  $News =$_POST['News'];
     
      
      $sql = 'INSERT INTO Website(Newso,img1)	
	  VALUES(:News, :image )';	  
      $statement = $connection->prepare($sql);  
      if ($statement->execute([':News' => $News,  ':image' => $img_name])) {
        echo "<script>alert('data inserted successfully');</script>";
    }
	
	 
  }
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
<?php require 'side a.php';?>
   

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="#"> news</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add a news</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">news  </h1>
      </div> 
    </div> 
  </div> 
 
  <div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Add a news</h2>
    </div>
    <div class="card-body">
        
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
        <div class="form-group">
          <label for="fname">News</label>
         
		  <textarea name="News" id="message" cols="30" rows="8" class="form-control"></textarea>
        </div>
       <div >
          <label >image</label>
          <input type="file" name="image"  >
        </div>
		
        
		
        <div class="form-group">
          <button type="submit" name="submit" class="btn btn-info">Add a News</button>
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