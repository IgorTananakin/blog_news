<?php
session_start();
require_once 'user.php';
   
    $user= New User;
    $user->logout();