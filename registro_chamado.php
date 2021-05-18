<?php 
   session_start();

   ////   Formatando texto recebidos do (abrir_chamado.php)  ////  

   $titulo = str_replace('#','-', $_POST['titulo']); 
   $categoria = str_replace('#','-', $_POST['categoria']); 
   $descricao = str_replace('#','-', $_POST['descricao']); 
   $texto = $_SESSION['id'] .'#'. $titulo . '#' . $categoria . '#' . $descricao . PHP_EOL;

      ////   Criando arquivo de abertura e escrita dos dados recebidos  ////

   $arquivo = fopen('arquivo.hd','a');
   fwrite($arquivo, $texto);
   fclose($arquivo);
   header('Location: abrir_chamado.php');
?>