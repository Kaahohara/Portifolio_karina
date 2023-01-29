<?php
session_start();
include('conexao.php');
if (isset($_POST['carrinho'])) {

    $livros_pegos_p_pessoa = mysqli_query($con, 'SELECT * FROM carrinho WHERE Email="' . $_SESSION['login'] . '" AND ISBN="'.$_POST['carrinho'].'"');
    if (empty(mysqli_num_rows($livros_pegos_p_pessoa))) {
        $insere = mysqli_query($con, 'INSERT INTO carrinho(ISBN, Email,Quantidade) VALUE ("' . $_POST['carrinho'] . '","' . $_SESSION['login'] . '","1")');
    }
    while ($separa_livros = mysqli_fetch_assoc($livros_pegos_p_pessoa)) {

        if ($_POST['carrinho'] == $separa_livros['ISBN']) {
          
            $quantidade = $separa_livros['Quantidade']+1;
          
            $insere = mysqli_query($con, 'UPDATE carrinho SET Quantidade= "' . $quantidade . '" WHERE Email="' . $_SESSION['login'] . '" AND ISBN=' . $_POST['carrinho'] . '');

        } 
        
    }
}
if (isset($_POST['deletar'])) {
    $deletar = mysqli_query($con, 'DELETE FROM carrinho WHERE Email="' . $_SESSION['login'] . '" AND ID_Carrinho="' . $_POST["deletar"] . '"');
}
if (isset($_POST['alugar'])) {
    $vencimento = strtotime('+7 day');
   


    $copia_carrinho = mysqli_query($con, 'SELECT * FROM carrinho WHERE Email="' . $_SESSION['login'] . '"');
    while ($livros_copiados = mysqli_fetch_assoc($copia_carrinho)) {
        $deletar = mysqli_query($con, 'DELETE FROM carrinho WHERE Email="' . $_SESSION['login'] . '" AND ID_Carrinho="' . $livros_copiados["ID_Carrinho"] . '"');
        $alugar = mysqli_query($con, 'INSERT INTO agendados(ISBN, Email,Quantidade,vencimento) VALUE ("' . $livros_copiados['ISBN'] . '","' . $_SESSION['login'] . '","1","' . date('Y/m/d', $vencimento) . '")');
    }
    echo "<script LANGUAGE='JavaScript'>
window.alert('Agendado')
window.location.href='agendados.php';
</script>";
}
?>
<html>

<head>
    <title>Biblioteca Online</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <style>
        a {
            text-decoration: none;
            color: 000;
        }
        .navbar{
            background-color: #710c04;
        }
    </style>
   

    <nav class="navbar navbar-expand-lg navbar-light ">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Biblioteca</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="agendados.php">Meus Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="carrinho.php">Carrinho</a>
                    </li>
                    <li class="nav-item">
                        <?php

                        if (isset($_SESSION['login'])) {
                            echo "<a class='nav-link active' href='logout.php'>Sair</a>";
                        } else {
                            echo "<a class='nav-link active' href='login.php'>Fazer login</a>";

                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br>
    <center>
        <div class='row'>
        <?php
        if (isset($_SESSION['login'])) {
            $livros_pegos_p_pessoa = mysqli_query($con, 'SELECT * FROM carrinho WHERE Email="' . $_SESSION['login'] . '"');
            while ($separa_livros = mysqli_fetch_assoc($livros_pegos_p_pessoa)) {
                $livros_pegos = mysqli_query($con, 'SELECT * FROM livros WHERE ISBN="' . $separa_livros['ISBN'] . '"');
                while ($livro = mysqli_fetch_assoc($livros_pegos)) {
                    echo '
                <form method="POST">
                <div class="col invisivel"  id="' . $livro['ISBN'] . '" >
                <img src=capas/' . $livro['Imagem'] . ' height=200px;width=200px;>
               
              ' . $livro['Nome'] . $separa_livros['Quantidade'] . ' 
                <button type="submit" name="deletar" value="' . $separa_livros['ID_Carrinho'] . '" class="btn btn-outline-danger">Deletar</button>
                </div>
                <hr>
                </form>

                ';
                }
            }

            ?></div>
            <form method="POST">
                <?php
                $verifica = mysqli_query($con, 'SELECT * FROM carrinho WHERE Email="' . $_SESSION['login'] . '"');
                if (!empty(mysqli_num_rows($verifica)))
                    echo "       <center> <button type='submit' name='alugar' class='btn btn-outline-secondary'>Alugar livros</button></center>
    ";
                else {
                    echo 'Carrinho vazio';
                }
        }
        ?>
    </center>
    </form>