<?php
 
class Event {
    var $id;
    var $date;
    var $full_text;
    var $header;
    var $preview;
    var $picture;
    var $id_user;
    var $arr;
    var $onpage = 5;
    var $user_name;
    // var $id_news;
    function create(){
        global $connect2;
        $connect2->query("INSERT INTO `event_new` (`header`,`full_text`,`preview`,`id_user`,`date`) VALUES ('".$this->header."', '".$this->full_text."', '".$this->preview."','".$this->id_user."','".$this->date."')");
        header('Location: ../index_blog.php');
        // echo "INSERT INTO `event_new` (`header`,`full_text`,`preview`,`id_user`,`date`) VALUES ('".$this->header."', '".$this->full_text."', '".$this->preview."','".$this->id_user."','".$this->date."')";
    }
    function update(){
        global $connect2;
        //загружаю всё кроме картинки
    if ($_FILES['picture']['name'] == null){   
        $connect2->query( "UPDATE `event_new` SET `header`='".$this->header."',`preview`='".$this->preview."',`full_text`='".$this->full_text."' WHERE `id`='".$this->id."'");
    }   
    //загружаю всё c картинкой при условии что всё заполнено
    if ($_FILES['picture']['name'] != null){
    $this->picture =   time() . $_FILES['picture']['name'];
    //var_dump($_FILES['picture']['name']);

            if (!move_uploaded_file($_FILES['picture']['tmp_name'], '../../images/uploads/' . $this->picture)) {
                $_SESSION['message'] = 'Ошибка при загрузке сообщения';
            }
            $connect2->query( "UPDATE `event_new` SET `header`='".$this->header."',`preview`='".$this->preview."',`full_text`='".$this->full_text."', `picture`='".$this->picture."' WHERE `id`='".$this->id."'");
            // echo "UPDATE `event_new` SET `header`='".$this->header."',`preview`='".$this->preview."',`full_text`='".$this->full_text."', `picture`='".$path."' WHERE `id`='".$this->id_news."'";

        }

		header('Location: ../update_news.php');
    }
    function delete(){
        global $connect2;
        // $id_news = $_GET['ID_news'];
        // $id_news = (int)$id_news;
    
    
    
    $connect2->query( "DELETE FROM `event_new` WHERE `id` = '".$this->id."'");
    
            
            header('Location: ../index_admin.php');
    }

    function read(){
        global $connect2;
        if (isset($_GET['ID_news'])){
            $this->id = $_GET['ID_news'];
            $this->id = (int)$this->id;
          }else {$this->id= $_SESSION['user']['id_news'];}
        
            $result_user_new1 = $connect2->query( "SELECT `users`.`user_name`,`event_new`.`id`, `event_new`.`date`, 
          `event_new`.`header`, `event_new`.`full_text`, `event_new`.`preview`, `event_new`.`picture` 
          FROM `users`, `event_new` WHERE `event_new`.`id` = '".$this->id."' AND `users`.`id` = `event_new`.`id_user` ");
          
        $row1 =$result_user_new1->fetch_array(MYSQLI_ASSOC);//преобразую в объект

        // $this->id = !empty($_SESSION['user']['id_news']) ? (int)$_SESSION['user']['id_news'] : false;
        $this->picture = $row1['picture'];
        // $this->id_user = $row1['picture'];
        $this->header=$row1['header'];
        $this->full_text = $row1['full_text'];
        $this->preview=$row1['preview'];
        $this->date=$row1['date'];
    }
  
    function list($page = 0){
        global $connect2;
        if($this->onpage != 0){
            $numpage = $page * $this->onpage;
            $result_new1 = $connect2->query( 'SELECT `users`.`user_name`,`event_new`.`id`, `event_new`.`date`, 
            `event_new`.`header`, `event_new`.`full_text`, `event_new`.`preview`, `event_new`.`picture` ,`event_new`.`id_user`
            FROM `users`, `event_new` WHERE `users`.`id` = `event_new`.`id_user` ORDER BY `id` DESC LIMIT '.$numpage.','.$this->onpage);
            // $result_new1 = $connect2->query( 'SELECT * FROM `event_new` ORDER BY `id` DESC LIMIT '.$numpage.','.$this->onpage); 
        } else {
            $result_new1 = $connect2->query( 'SELECT `users`.`user_name`,`event_new`.`id`, `event_new`.`date`, 
            `event_new`.`header`, `event_new`.`full_text`, `event_new`.`preview`, `event_new`.`picture`,`event_new`.`id_user` 
            FROM `users`, `event_new` WHERE `users`.`id` = `event_new`.`id_user`');
            // $result_new1 = $connect2->query( 'SELECT * FROM `event_new` ORDER BY `id` DESC'); 
        }

        // $arr = $result_new1->fetch_all(MYSQLI_ASSOC);
        return $result_new1;
        
    }
    function maxpage(){
        global $connect2;
        $result_new1 = $connect2->query( 'SELECT COUNT(*) AS n FROM `event_new` GROUP BY `id` '); 
        $row1 =$result_new1->fetch_array(MYSQLI_ASSOC);//преобразую в объект
        return ceil($row1['n']/$this->onpage);
    }
    function next($result_new1){
        $row1 = $result_new1->fetch_array(MYSQLI_ASSOC);
        $this->id = $row1['id'];
        $this->picture = $row1['picture'];
        $this->id_user = $row1['id_user'];
        $this->header=$row1['header'];
        $this->full_text = $row1['full_text'];
        $this->preview=$row1['preview'];
        $this->date=$row1['date'];
        $this->user_name=$row1['user_name'];
        return $row1;
    }
    function get_form(){
        $this->id = !empty($_SESSION['user']['id_news']) ? (int)$_SESSION['user']['id_news'] : false;
        $this->picture = !empty($_POST['picture']) ? $_POST['picture'] : false;
        $this->id_user = !empty($_SESSION['user']['id']) ? $_SESSION['user']['id'] : false;
        $this->header=!empty($_POST['header']) ? $_POST['header'] : false;
        $this->full_text = !empty($_POST['full_text']) ? $_POST['full_text'] : false;
        $this->preview=!empty($_POST['preview']) ? $_POST['preview'] : false;
        $this->date=date('Y:m:d');
    }
}