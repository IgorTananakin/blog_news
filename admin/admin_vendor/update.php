<?php
session_start();
    require_once '../../vendor/connect.php';
    require_once '../../vendor/event.php';
    $event = New Event;
    $event->get_form();
    $event->update();




