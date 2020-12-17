<?php

    session_start();
    require_once 'connect.php';
    require_once 'user.php';
    $user= New User;
    $user->get_form();
    $user->signin();

    // $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
  
    ?>

<pre>
    <?php
    print_r($check_user);
    print_r($user);
    ?>
</pre>
