<?php
//файл подключения базы
// ini_set('display_errors','Off');
// $servername = "localhost";
// $username = "root";
// $password = "";
// $database ="news";
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'news');

// $servername = "localhost";
// $username = "sudo";
// $password = "";
// $database ="task";


$connect2= new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
if ($connect2->connect_errno){
    echo "соединение не удалось";
    header('Location: install.php?connect_error=1');
}
// if (!$connect2) {
//     die("Ошибка подключения: " . mysqli_connect_error());
// }
// echo "База подключена";