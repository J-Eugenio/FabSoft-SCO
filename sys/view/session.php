<?php
  function isAuth(){
     session_start();
       if(isset($_SESSION['user_id']))
           return true;
      return false;
  }
?>