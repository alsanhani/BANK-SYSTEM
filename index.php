<?php
session_start();
require('db.php');
if (isset ($_POST['btn'])) {
$username=$_POST['username'];
$password=$_POST['password'];
$remember=$_POST['remember'];
if ($remember==1){
    setcookie('cookie_user', $username, time() + (86400 * 30), "/"); // 86400(60*60*24) = 1 day
}
$sql="SELECT * FROM users where username =:username && password =:password";
$statement = $connection->prepare($sql);
$statement->execute([':username' => $username, ':password' =>md5($password)]);
$user = $statement->fetch(PDO::FETCH_OBJ);
$count = $statement->rowCount();
if ($count==1){
    $id=$user->id;
    $_SESSION['username']= $user->username;
    date_default_timezone_set("Asia/Aden");
    $today = date("Y-m-d h:i:sa");
    $sql1="UPDATE users set last_login=:today where id=:id";
    $statement1 = $connection->prepare($sql1);
    $statement1->execute([':today' => $today, ':id' => $id]);
	
	
	$sql = "SELECT type from users where username ='{$_POST['username']}'";
    $st=$connection->query($sql);
	$m=$st->fetch(PDO::FETCH_NUM); 
	
	
	 if($m[0] == 0 ){
	 header("location:C.d.php");}		 
	else {
    header("location:C.U.php");}
	
}
else{
?>
<script>
        alert( 'Invalid User And Password...');
        window.location='index.php';
    </script>
<?php
}
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login </title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>BLOOD BANK SYSTEM</strong> </h1>
                            <div class="description">
                            	<p>
	                            	
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login to our site</h3>
                            		<p>Enter your username and password to log on:</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form"  class="login-form" method="POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
									<label class="form-check-label text-muted">
									
                      <input type="checkbox" name="remember" value="1" class="form-check-input">
                      Keep me signed in
                    </label>

			                        <button type="submit" name="btn" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    
                       
                        	
	                        	
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            


        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>