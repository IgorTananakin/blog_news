<?php
if(!(!empty($_GET['connect_error']) && $_GET['connect_error']=='1')){
    print_r($_POST);
    if(isset($_POST['servername']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['database'])) {
        $servername=$_POST['servername'];
        $username=$_POST['username'];
        $passsword=$_POST['password'];
        $database=$_POST['database'];
        $filename = 'connect.php';
		$file = file($filename);
		if (is_array($file)) {
			foreach($file as $key => $value) {
				$arr_pattern = [
					"/^define[(]'DB_SERVER',\s'.*'[)];/",
					"/^define[(]'DB_USERNAME',\s'.*'[)];/",
					"/^define[(]'DB_PASSWORD',\s'.*'[)];/",
					"/^define[(]'DB_DATABASE',\s'.*'[)];/",
				];
				$arr_replace = [
					"define('DB_SERVER', '".$_POST['servername']."');",
					"define('DB_USERNAME', '".$_POST['username']."');",
					"define('DB_PASSWORD', '".$_POST['password']."');",
					"define('DB_DATABASE', '".$_POST['database']."');",
					
				];
				$file[$key] = preg_replace($arr_pattern, $arr_replace, $value);
			}
            file_put_contents($filename, $file);
            //echo "настройки доступа;";

			header('Location: install.php');
		} 
    } else{
        require_once 'connect.php';
        $result = $connect2->query('SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_NAME = "event_new" OR TABLE_NAME = "users" LIMIT 2');
        // var_dump($result->fetch_array(MYSQLI_ASSOC));
        if($result->num_rows!=2){
          $connect2->query("

          CREATE TABLE `event_new` (
            `id` int(8) NOT NULL,
            `date` date NOT NULL,
            `header` varchar(30) NOT NULL,
            `full_text` varchar(500) NOT NULL,
            `preview` varchar(150) NOT NULL COMMENT 'анонс',
            `picture` varchar(500) NOT NULL,
            `id_user` int(11) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
          $connect2->query("

          CREATE TABLE `users` (
            `id` int(11) NOT NULL,
            `user_name` varchar(50) NOT NULL,
            `password` varchar(50) NOT NULL,
            `login` varchar(50) NOT NULL,
            `key` int(1) NOT NULL
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
          
          ");
          
          header('Location: install.php');
        } else {
           
             header('Location: ../index_blog.php');
        }
    }
} else{

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <form action="install.php" method="POST">
            <input type="text" name="servername" placeholder="localhost servername">
            <input type="text" name="username" placeholder="usernamebd">
            <input type="text" name="password" placeholder="passwordbd">
            <input type="text" name="database" placeholder="database">
            <button  type="submit"> Установить</button>
        </form>
    </body>
    </html>
<?php } 
    
?>

