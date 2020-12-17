<?php
    session_start();
		require_once 'vendor/connect.php';
		require_once 'vendor/event.php';
		$event= New Event;
    $page=!empty($_GET['page'])?$_GET['page']:0;


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
     
    </ul>
    <span class="navbar-text">
      <ul class="navbar-nav mr-auto">


   <?php 
   if (isset($_SESSION['user'])){
   	echo '<li class="nav-item active">
<a class="nav-link" href="profile.php">'. $_SESSION['user']['user_name'].'</a>
</li>';} else
echo '<li class="nav-item active">
      		<a class="nav-link" href="login.php">Авторизоваться</a>
      	</li>';
      	?>
      	<li class="nav-item active">
      		<a class="nav-link" href="registration.php">Регистрация</a>
      	</li>
      </ul>
    </span>
  </div>
</nav>
</header>
<section class="d-flex justify-content-start flex-wrap  ">

<?php
 
$result_new1 = $event->list($page);
 while ($event->next($result_new1)){
		?>

	<div class="card col-5 m-t-10 m-l-5 pb-1">


		<a <?php echo 'href="details_news.php?ID_news='.$event->id.'"';?>><h1><?php echo $event->date.' '.$event->header;?> </h1></a>
		<div class="preview d-flex justify-content-start p-t-5 p-r-5 ">
			<div class="p-l-10">
				<p><?php echo $event->preview;?></p>
			</div>
		</div>
	</div>
<?php }?>

<div class="pagunator">
	<div style="position: fixed; left:0; bottom:0; width: 100%; height: 30px; z-index: 99; background:#fff; text-align:center;">
	
		<?php for($i=1; $i<=$event->maxpage()+1; $i++){
			if ($i==$page+1){
				echo $i;
			} else{
				?>
			<a  href="?page=<?php echo $i-1;?>"><?php echo $i;?></a>
			<?php }}?>
			</div>
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