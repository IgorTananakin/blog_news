<?php
session_start();
    require_once 'connect.php';
    require_once 'event.php';
//добавление задачи зарегистрированнного пользователя
  $event = New Event;
  $event->get_form();
  $event->create();
// var_dump($date);


		