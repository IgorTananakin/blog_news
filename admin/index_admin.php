<?php
    session_start();
    require_once '../vendor/connect.php';
    // $login=$_SESSION['user']['id'];
    require_once '../vendor/user.php';
    require_once '../vendor/event.php';
   
    $user= New User;
    $user->get_form();
    $user->get_db();
    if(!$user->isAdmin()){
            header('Location: ../index_blog.php');
    }
    $event= New Event;

  
    
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

// $result_user_new1 = $connect2->query('SELECT `users`.`user_name`,`event_new`.`id`, `event_new`.`date`, 
//   `event_new`.`header`, `event_new`.`full_text`, `event_new`.`preview`, `event_new`.`picture` 
//   FROM `users`, `event_new` WHERE `users`.`id` = `event_new`.`id_user`'); 

    ?>


	<div class="card col-11 m-t-10 m-l-5 pb-1">
		<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Дата</th>
      <th>Заголовок</th>
      <th>Картинка</th>
      <th>Анонс</th>
      <th>Полный текст</th>
      <th>Автор</th>
      <th>Действия</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $kol=0;
    $event->onpage=0;
   
    //$row1 = $result_user_new1->fetch_array(MYSQLI_ASSOC);
    $result_new1 = $event->list();
    while ($event->next($result_new1)){
      $kol++;
      ?>
    <tr>
      
      <td><?php echo $kol;?></td>
      <td><?php echo $event->date;?></td>
      <td><?php echo $event->header;?></td>
      <td><?php echo $event->date;?></td>
      <td><?php echo $event->preview;?></td>
      <td><?php echo $event->full_text;?></td>
      <td><?php echo $event->user_name;?></td>
      
      <td><a <?php echo 'href="update_news.php?ID_news='.$event->id.'"';?> class="btn btn-success">Редактировать</a></td>
      <td><a <?php echo 'href="admin_vendor/delete.php?ID_news='.$event->id.'"';?> class="btn btn-danger">Удалить</a></td>
    </tr>
  <?php } ?>
   
  </tbody>
</table>
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