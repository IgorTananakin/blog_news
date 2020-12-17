<?php
session_start();
    require_once 'connect.php';
    require_once 'user.php';
   
    $user= New User;
    $user->get_form();
    $user->set_new();

   