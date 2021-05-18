<?php
   session_start();

   //// Variáveis de controle/verificação de acesso ////

   $usuario_id = null;
   $perfis_usuarios_id = null;
   
   
   //// Usuários do Sistema ////    //// Seleção Nível de usuário ////
   
   $perfis = array( 1 => 'Administrativo', 2 => 'Usuários Cadastrados');
   $usuarios_cadastrados = array(
      ['id' => 1 ,'email' => 'adm@gmail.com', 'senha' => '123', 'perfil_id' => 1],
      ['id' => 2 ,'email' => 'user@gmail.com', 'senha' => '123', 'perfil_id' => 1],
      ['id' => 3 ,'email' => 'rodrigo@gmail.com', 'senha' => '123', 'perfil_id' => 2],
      ['id' => 4 ,'email' => 'jose@gmail.com', 'senha' => '123', 'perfil_id' => 2],
   );

   //// Tratando Dados recebidos do (Form), enviados do index.php ////

   foreach($usuarios_cadastrados as $user){
      if($user['email'] === $_POST['email'] && $user['senha'] === $_POST['senha']){
         $user_Autenticacao = true;
         $usuario_id = $user['id'];
         $perfis_usuarios_id = $user['perfil_id'];
      }else{
         $usuarios_cadastrados = false;
      }
   };

   if($user_Autenticacao){
      $_SESSION['autenticado'] = true;
      $_SESSION['id'] = $usuario_id;
      $_SESSION['perfil_id'] = $perfis_usuarios_id;
      header('Location: home.php');
   }else{
      header('Location: index.php?login=erro');
      $_SESSION['autenticado'] = false;
   };

?>