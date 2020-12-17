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
      <li class="nav-item active">
        <a class="nav-link" href="add_news.php">Создание новости <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> -->
    </ul>
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      	<li class="nav-item active">
      		<a class="nav-link" href="login.php">Авторизоваться</a>
      	</li>
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
		<form action="vendor/add.php" method="post" class="login100-form validate-form" enctype="multipart/form-data">

<?php 
//SELECT user_name FROM `users` WHERE id=$_SESSION['user']['id'];

// $user_name=$_SESSION['user']['id'];
// $login=$_SESSION['user']['id'];
// $result1 = mysqli_query($connect, "SELECT `user_name` FROM `users` WHERE `id`='$user_name'");
// $result2 = mysqli_query($connect, "SELECT `login` FROM `users` WHERE `id`='$login'");
?>


		<div class="wrap-input100 validate-input m-b-23" data-validate = "Некорректный заголовок">
			<h3 >Заголовок</h3>
			<input class="input0" type="text" name="header" placeholder="Заголовок вашей новости">
		</div>

		<div class="wrap-input100 validate-input m-b-23" data-validate = "Некорректный анонс">
			<h3 >Анонс</h3>
			<input class="input0" type="text" name="preview" placeholder="Анонс вашей новости">
		</div>

		<div class="wrap-input100  m-b-23 " data-validate = "Некорректный текст">
			<h3 >Полный текст новости</h3>
			<textarea class="input0 " type="text" name="full_text" placeholder="Полный текст вашей новости"></textarea>
		</div>





		
		<div class="text-left p-t-8 p-b-31">
			<button type="submit"   class="btn btn-success">Создать новость</button> 
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