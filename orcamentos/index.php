<?php
include('conexao.php');
session_start();
if(!isset($_SESSION['login'])){
    $_SESSION['login'] = rand(0, 500);
    $adicionar_usuario=mysqli_query($con, 'INSERT INTO usuarios(login) VALUES("'.$_SESSION['login'].'")');

}
 if(isset($_POST['mais'])){
   $adicionar_card=mysqli_query($con, 'INSERT INTO cards(nome, ID_pessoa) VALUES("Adicionar Titulo","'.$_SESSION['login'].'");');
if($adicionar_card){
        echo 'oi';
} 
}

?>
<html>
<head>
    <title>Portifolio-Karina Ohara</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<div class="card">
    Orçamentos
</div>
<div class="container">
    <div class="row">
        <?php
      
        $cards = mysqli_query($con, 'SELECT * FROM cards');
        while ($exibe = mysqli_fetch_assoc($cards)) {

            echo '
        <div class="col">
            <div class="card" style="background-color:#006699;">
                oi
            </div>
        ';
        }
        ?>
        </div>
        <div class="col">
            <div class="card">
             <form action="index.php" method="POST">
                <button type="submit" class="btn btn-outline-primary" id="mais" name="mais">Adicionar</button>
              </form>
            </div>
        </div>