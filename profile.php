<?php
session_start();
require_once 'vendor/connect.php';

if (!$_SESSION['user']) {
    header('Location: index_blog.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	
<div class="div" style="background-image: url('images/bg-01.jpg');">
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index_blog.php">Новостной блок <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="profile.php">Личный кабинет <?php if (isset($_SESSION['user'])){ echo " ".$_SESSION['user']['user_name'];}?><span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> -->
    </ul>
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      	<?php 
   if (isset($_SESSION['user'])){
   	echo '<li class="nav-item active">
<a class="nav-link" href="profile.php">'. $_SESSION['user']['user_name'].'</a>
</li>';} 
      	?>
      	<li class="nav-item active">
      		<a class="nav-link" href="registration.php">Регистрация</a>
      	</li>
      </ul>
    </span>
  </div>
</nav>
</header>
<section class="d-flex justify-content-center">
	<div class="card col-11 m-t-10 m-l-5 pb-1">
		<form action="vendor/update_user.php" method="post" class="login100-form validate-form" enctype="multipart/form-data">

<?php 
//SELECT user_name FROM `users` WHERE id=$_SESSION['user']['id'];

$user_name=$_SESSION['user']['id'];
$login=$_SESSION['user']['id'];
$result1 = $connect2->query( "SELECT `user_name` FROM `users` WHERE `id`='".$user_name."'");
$result2 = $connect2->query( "SELECT `key`,`login` FROM `users` WHERE `id`='".$login."'");

?>


		<div class="wrap-input100 validate-input m-b-23" data-validate = "Логин не найден">
			<h3 >Логин</h3>

			<?php $row1 =$result1->fetch_array(MYSQLI_ASSOC);
				?>

			<input class="input100" type="text" name="user_name" <?php echo 'value="'.$row1['user_name'].'"';?>>

		<?php  ?>

			<span class="focus-input100" data-symbol="&#xf206;"></span>
		</div>





		<div class="wrap-input100 validate-input m-b-23" data-validate = "Почта не найдена">
			<h3 >Почта</h3>

			<?php $row2 =$result2->fetch_array(MYSQLI_ASSOC);
				?>

			<input class="input100" type="text" name="login" <?php echo 'value="'.$row2['login'].'"';?>>

			

			<span class="focus-input100" data-symbol="&#xf206;"></span>
		</div>
		<div class="text-left p-t-8 p-b-31">
			<a href="vendor/logout.php" class="btn btn-danger">Выйти</a>
			<button type="submit"   class="btn btn-success">Сохранить</button> 
			<a href="add_news.php" class="btn btn-primary">Подать новость</a>

			<?php 
				if ($row2['key'] == 1){
					$_SESSION['user']['key_admin']=1;
					echo '<a href="admin/index_admin.php" class="btn btn-warning">Админ панель</a>';
				}
			
				
			?>
		</div>
		</form>
	</div>
</section>
	</div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>

	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>

	<script src="vendor/countdowntime/countdowntime.js"></script>

	<script src="js/main.js"></script>

</body>
</html>