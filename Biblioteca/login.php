<?php
session_start();
include('conexao.php');

?>
<html>
    <head>
    <title>Logar</title>
<meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body background="capas/fundo-biblioteca2.jpg">
     <form method='POST'>
        <br> <br> <br>
        <div class='card' style='border-color:#c0c0c0;color:#fff;background-color:#4e2026;margin-left:auto;margin-right:auto;position relative;width:400px;height:60%;'>
       <?php
       if(isset($_POST['logar'])){
        $login = mysqli_query($con, 'SELECT * FROM usuario WHERE login="' . $_POST['email'] . '"AND senha="'.MD5($_POST['Senha']).'"');
         if (empty(mysqli_num_rows($login))) {
            echo '<center>Algo deu errado</center>';
        } else {
            
            $_SESSION['login'] = $_POST['email'];
            header("Location: index.php");
        }
      }
      ?>
        <center>
            <br><h5>Faça login</h5>
           <br><br><br> 
      <label style='width:300px;'>E-mail:
        <input type='email' style='width:90%;'name='email'required></label><br><br>
        <label style='width:300px;'>Senha:
        <input type='password'style='width:90%;' name='Senha'required></label><br><br><br><br>
        <button type='submit' name='logar' class='btn btn-secondary'>Login</button>
       <br> <a style='text-decoration:none;color:#fff;'href='cadastro.php'>Não possui uma conta?</a>    
    </center>