<?php
require_once 'connect.php';
class User {
    var $id;
    var $user_name;
    var $password;
    var $password_confirm;
    var $login;
    var $key;
    
    function  set_new()
    //установка при регистрации и редактирование
    {
        global $connect2;
        if ($this->password === $this->password_confirm) {

            // $path = 'uploads/' . time() . $_FILES['avatar']['name'];
            // if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            //     $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            //     header('Location: ../registration.php');
            // }
    
            $this->password = md5($this->password);
    
            // mysqli_query($connect, "INSERT INTO `users` ( `user_name`, `login`,  `password`,`key` ) VALUES ( '$user_name', '$login',  '$password','$key')");
            $connect2->query("INSERT INTO `users` ( `user_name`, `login`,  `password`,`key` ) VALUES ( '".$this->user_name."', '".$this->login."',  '".$this->password."','".$this->key."')");
    
    
    
            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: ../login.php');
    
    
        } else {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: ../registration.php');
        }
    }

    function get_form(){
        $this->user_name = !empty($_POST['user_name']) ? $_POST['user_name'] : false;
        $this->login = !empty($_POST['login']) ? $_POST['login'] : false;
        $this->password = !empty($_POST['password']) ? $_POST['password'] : false;
        $this->password_confirm = !empty($_POST['password_confirm']) ? $_POST['password_confirm'] : false;
        $this->key=0;
        $this->id = !empty($_SESSION['user']['id']) ? (int)$_SESSION['user']['id'] : false;
    
    }
    function signin(){
        global $connect2;
        $this->password = md5($this->password);
        $check_user = $connect2->query("SELECT * FROM `users` WHERE `login` = '".$this->login."' AND `password`='".$this->password."'");
    if ($check_user->num_rows > 0) {

        $user = $check_user->fetch_array(MYSQLI_ASSOC);
        

        $_SESSION['user'] = [
            "id" => $user['id'],
            "user_name" => $user['user_name'],
            "login" => $user['login'],

        ];

       
         header('Location: ../index_blog.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
        header('Location: ../login.php');
    }
    }
    function set(){
        global $connect2;
        $connect2->query("UPDATE `users` SET `user_name`='".$this->user_name."',`login`='".$this->login."' WHERE `id`='".$this->id."'");
        header('Location: ../profile.php');
        // echo "UPDATE `users` SET `user_name`='".$this->user_name."',`login`='".$this->login."' WHERE `id`='".$this->id."'";
    }
    function logout(){
        unset($_SESSION['user']);
        header('Location: ../index_blog.php');
    }
    function isAdmin(){
        
        if ($this->key == 1){
            return true;
            // header('Location: ../index_blog.php');
          }else{
              return false;
          }
      
    }
    function get_db(){
        global $connect2;
        $result2  = $connect2->query("SELECT * FROM `users` WHERE `id`='".$this->id."'");
        $row2=$result2->fetch_array(MYSQLI_ASSOC);//преобразую в объект

        $this->user_name = !empty($row2['user_name']) ? $row2['user_name'] : false;
        $this->login = !empty($row2['login']) ? $row2['login'] : false;
        $this->password = !empty($row2['password']) ? $row2['password'] : false;
        $this->key= !empty($row2['key']) ? $row2['key'] : false;
        $this->id = !empty($_SESSION['user']['id']) ? (int)$_SESSION['user']['id'] : false;
    }
    
}