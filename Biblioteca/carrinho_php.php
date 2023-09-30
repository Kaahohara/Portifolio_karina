<?php
session_start();
include("conexao.php");
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
header("location:carrinho.php");
?>