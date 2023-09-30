<html>

<head>
    <title>Biblioteca Online</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<body style='text-align:justify;'>
    <style>
        a {
            text-decoration: none;
           
        }
        @media only screen and (min-width: 1200px) {
        .selecao{
            width:25%;
           
        }
        }
        @media only screen and (max-width: 1200px) and (min-width: 970px) {
        .selecao{
            width:30%;
        }
        }
        @media only screen and (max-width: 980px) {
        .selecao{
            width:50%;
           
        }
        }
        @media only screen and (max-width: 580px) {
        .selecao{
            width:100%;
           
        }
        }

        .fora {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            
        }

        .modal_conteudo {
            text-align:justify;
            background-color: #fff;
            margin-top: 1%;
            margin-left:auto;
            margin-right:auto;
            height: auto;
            border: 1px solid #888;
            width: 600px;
            position:relative;
            border-radius:15px;

        }
        .navbar{
            background-color: #710c04;
        }
        .invisivel {
            display: none;
        }
    </style>
    <script>

        function modal(livro_selecionado) {
            document.getElementById('div_modal').style.display = 'block';
            document.getElementById(livro_selecionado).style.display = 'block';
console.log(livro_selecionado);
            window.onclick = function (event) {
                if (event.target == document.getElementById('div_modal')) {
                    document.getElementById('div_modal').style.display = "none";
                    document.getElementById(livro_selecionado).style.display = 'none';
                }
            }
        }

    </script>


<nav class="navbar navbar-expand-lg navbar-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Biblioteca</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
session_start();

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
   
    <br>
    <br>
   <div class='container'>
        <div class='row'>
           
            <?php
          
            include('conexao.php');
            $seleciona = mysqli_query($con, 'SELECT * FROM livros');
            while ($exibe = mysqli_fetch_assoc($seleciona)) {

                echo ' 
        
        <div class="selecao">
       <center> ';
       ?>
       <button type="button" style="border:none;background-color:white;" id="seleciona" onclick="modal('<?php echo $exibe['ISBN']; ?>')">
       <?php
       echo'

       <img width="250px"height="300px" src='.$exibe['Imagem'].' alt="'.$exibe['Titulo'].'/>";
       <br> <br>
        '. $exibe['Titulo'].'
        <hr>
        </button>
        </center>
        </div>  
       ';

            }
            ?>
       
        </div>
        </div>
  
    <div class='fora' id='div_modal'>
        <div class='modal_conteudo'>
            <br>
            <?php
            if (isset($_SESSION['login'])) {
                
                echo '
               
        <form action="carrinho_php.php" method="POST">';
             
                $seleciona = mysqli_query($con, 'SELECT * FROM livros');
                while ($exibe = mysqli_fetch_assoc($seleciona)) {
                    echo ' 
        
        <div class="invisivel"  id="' . $exibe['ISBN'] . '" >
        <center>  
        <img width="300px"height="300px" src='.$exibe['Imagem'].' alt="'.$exibe['Titulo'].'"><br><br><br>
        <div class="card" style="width:500;border:none; outline:none; text-align:justify;">
        <center>
        ' . $exibe['resumo'] . '
       
        </div><br><br><br>
       
        <button type="submit" name="carrinho"  class="btn btn-outline-danger"  value="' . $exibe['ISBN'] . '">Add Carrinho</button>
        </center>
        </div>';

                }
            } else {
                echo '
        <form action="login.php" method="POST">';
              
                $seleciona = mysqli_query($con, 'SELECT * FROM livros');
                while ($exibe = mysqli_fetch_assoc($seleciona)) {
                    echo ' 
                
        <div class="invisivel"  id="' . $exibe['ISBN'] . '" >
        <center> 
        <img src='.$exibe['Imagem'].' alt="'.$exibe['Titulo'].'"><br><br><br>    
        <div class="card" style="width:500;border:none; outline:none; text-align:justify;">
        <center>
        <p style=" text-align:justify;">' . $exibe['resumo'] . '
       
        
        </div>  <br><br><br>
        <button type="submit" name="carrinho"   class="btn btn-outline-secondary" value="' . $exibe['ISBN'] . '">Faça login para adicionar livros</button>
        </center>
      ';
                }
                
            }
            ?>
          
        </div>
    </div>
        </body>
        </html>