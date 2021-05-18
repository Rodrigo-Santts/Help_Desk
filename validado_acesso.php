<?php 
   session_start();
   if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] === false){
      header('Location: index.php?login=erro_validation');
   }
?>