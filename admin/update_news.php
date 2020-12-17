<?php
    session_start();
    require_once '../vendor/connect.php';
    require_once '../vendor/user.php';
    require_once '../vendor/event.php';

    $user= New User;
    $user->get_form();
    $user->get_db(); 
    $event= New Event;
    $event->read();
     
    if (!$user->isAdmin()){
      header('Location: ../index_blog.php');
    }
 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V4</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- <link rel="icon" type="image/png" href="images/icons/favicon.ico"/> -->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body>
<div class="div_" style="background-image: url('../images/bg-01.jpg');">
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index_blog.php">Новостной блок <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index_admin.php">Admin panel <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="update_news.php">Новость <span class="sr-only">(current)</span></a>
      </li>
      
      
      <!-- <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li> -->
    </ul>
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">
      	
      	
      	<li class="nav-item active">
      		<a class="nav-link" href="../registration.php">Регистрация</a>
      	</li>
      </ul>
    </span>
  </div>
</nav>
</header>
<section class="d-flex justify-content-center">
  <?php
 
    
  ?>
  <div class="card col-11 m-t-10 m-l-5 pb-1">
    <form action="admin_vendor/update.php" method="post" class="login100-form validate-form" enctype="multipart/form-data">


<?php 
    $_SESSION['user']['id_news']=$event->id;
     
      ?>
    <div class="wrap-input100 validate-input m-b-23" data-validate = "Заголовок не верный">
      <h3 >Заголовок</h3>
      <input class="input0" type="text" name="header" <?php echo 'value="'.$event->header.'"';?>>
    </div>
    <div class="wrap-input100 validate-input m-b-23" data-validate = "Анонс не верный">
      <h3 >Анонс</h3>
      <input class="input0" type="text" name="preview" <?php echo 'value="'.$event->preview.'"';?>>
    </div>
    <div class="wrap-input100 validate-input m-b-23" data-validate = "Текст не верный">
      <h3 >Полный текст</h3>
      <input class="input0" type="text" name="full_text" <?php echo 'value="'.$event->full_text.'"';?>>
    </div>
     <div class="wrap-input100 validate-input m-b-23" data-validate = "Картинка не найдена">
      <h3 >Картинка</h3>
      <?php 
        if ($event->picture != null){
          echo '<img class="img" src="../images/uploads/'.$event->picture.'">';
        }
        if ($event->picture == null){
          echo '<img src="../images/no_image.jpg">';
        }
      ?>

      <input class="" type="file"  name="picture" src="URL" accept="image/jpeg,image/png,image/gif"  >
    </div>

 

    <div class="text-left p-t-8 p-b-31">
      <button type="submit"   class="btn btn-success">Сохранить</button> 

    </div>
    </form>
  </div>
</section>
	</div>
	
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="../vendor/animsition/js/animsition.min.js"></script>

	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="../vendor/select2/select2.min.js"></script>

	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>

	<script src="../vendor/countdowntime/countdowntime.js"></script>

	<script src="../js/main.js"></script>

</body>
</html>