<html>

<head>
    <title>Biblioteca Online</title>
    <meta charset="utf-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<body>
    <style>
        a{
            text-decoration: none;
            color:000;
        }
        .navbar{
            background-color: #710c04;
        }
 
    </style>
  
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
          echo "    <a class='nav-link active' href='login.php'>Fazer login</a>";

      }
      ?>
     </li>
      </ul>
    </div>
  </div>
</nav>
   
<br><br>
<div class='container'>
    <div class='row'>
    <?php
    include('conexao.php');
   
        echo '<center><h2>Livros Agendados</h2></center><br><br><br><hr><br><br><br>';
    if(isset($_SESSION['login'])) {
        echo '<div class="row"><div class="col"><div class="row">';
        $livros_agendados = mysqli_query($con, 'SELECT * FROM agendados WHERE Email="' . $_SESSION['login'] . '"');
        if (empty(mysqli_num_rows($livros_agendados))) {
            echo 'Vazio';
        } else {
            while ($nome_livros = mysqli_fetch_assoc($livros_agendados)) {
                $livros_pegos = mysqli_query($con, 'SELECT * FROM livros WHERE ISBN="' . $nome_livros['ISBN'] . '"');
                while ($livro = mysqli_fetch_assoc($livros_pegos)) {
                    echo '          
                <div class="col-md-3"><img src=capas/' . $livro['Imagem'] . ' height=100px;width=100px;></div>
                <div class="col "><h5>' . $livro['Nome'] . '</h5><br>
                Devolva ate: ' . date_format(date_create($nome_livros['vencimento']), 'd-m-Y') . '</div><br><hr>';
            
                }
            }
        }
    }else{
        echo '<center>Voce ainda não agendou nenhum livro</center>';
    }
    ?>
    </div>
    </div>
</div>
   