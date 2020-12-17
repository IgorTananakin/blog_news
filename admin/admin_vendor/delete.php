<?php
session_start();
    require_once '../../vendor/connect.php';
    require_once '../../vendor/event.php';
    $event = New Event;
    $event->get_form();
    $event->delete();

//     $id_news = $_GET['ID_news'];
//     $id_news = (int)$id_news;



// mysqli_query($connect, "DELETE FROM `event_new` WHERE `id` = '$id_news'");


// 		header('Location: ../index_admin.php');