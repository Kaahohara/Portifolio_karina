<?php
session_start();
include('conexao.php');

?>
<html>
    <head>
    <title>Cadastre-se</title>
<meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body background="capas/fundo-biblioteca2.jpg">
     <form method='POST'>
        <br> <br> <br>
        <div class='card' style='border-color:#c0c0c0;color:#fff;background-color:#4e2026;margin-left:auto;margin-right:auto;position relative;width:500px;height:60%;'>
        
        <center>
            <?php
            if(isset($_POST['enviar'])){
                $login = mysqli_query($con, 'SELECT * FROM usuarios WHERE Email="' . $_POST['email'] . '"');
                       if (empty(mysqli_num_rows($login))) {
                        $insere=mysqli_query($con,'INSERT INTO Usuarios(Nome, Email,Senha) VALUE ("'.$_POST['nome'].'","'.$_POST['email'].'","'.MD5($_POST['Senha']).'")');
                        if($insere){
                            $_SESSION['login']=$_POST['email'];
                            header ("Location: index.php");
                        }
            
                }else{
                    echo 'Este login já foi cadastrado<br>';
                }
              
            }
            ?>
        <br>
        <h5>Cadastre-se</h5>
        <br> 
       <label>Nome:<br>
        <input type='name' style='width:300px;'name='nome' required></label><br><br>
        <label>E-mail:<br>
        <input type='email' style='width:300px;'name='email'required></label><br><br>
        <label>Senha:<br>
        <input type='password'style='width:300px;' name='Senha'required></label><br><br><br>
        <button type='submit' name='enviar' class='btn btn-secondary'> Cadastrar</button>
       <br> <a style='text-decoration:none;color:#fff;'href='login.php'>Já Possui um login?</a>    
    </center>