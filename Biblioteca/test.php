<?php
include('conexao.php');
// Chave de API do Google Books (substitua pela sua chave)
$api_key = 'AIzaSyBwhq1Wt_mEMjeYVgNVETpO00Y2JY7ndik';

// Lista de palavras-chave de categorias possíveis (você pode expandir essa lista conforme necessário)
$categorias = ['fiction', 'fantasy', 'romance', 'mystery', 'suspense', 'adventure', 'history', 'biography', 'nonfiction', 'poetry', 'drama', 'horror', 'humor', 'essays', 'self-help', 'spirituality', 'politics', 'science', 'philosophy', 'education'];

foreach ($categorias as $categoria) {
    $categoria_encodada = urlencode($categoria);
    $url = "https://www.googleapis.com/books/v1/volumes?q=subject:$categoria_encodada&key=$api_key";
    
    // Faz uma solicitação GET para a API
    $response = file_get_contents($url);
    
    // Decodifica a resposta JSON
    $data = json_decode($response, true);
    
    // Verifica se há livros disponíveis para esta categoria
    if (isset($data['items']) && count($data['items']) > 0) {
        echo "Categoria: $categoria<br>";
        foreach ($data['items'] as $item) {
            $bookInfo = $item['volumeInfo'];
            $title = $bookInfo['title'];
            $cover = isset($bookInfo['imageLinks']['thumbnail']) ? $bookInfo['imageLinks']['thumbnail'] : 'Sem capa disponível';
            $synopsis = isset($bookInfo['description']) ? $bookInfo['description'] : 'Sem sinopse disponível';
            $isbn = isset($bookInfo['industryIdentifiers'][0]['identifier']) ? $bookInfo['industryIdentifiers'][0]['identifier'] : 'Sem ISBN disponível';
    
            // Exibe as informações do livro
            echo "Título: $title<br>";
            echo "ISBN: $isbn<br>";
            echo "Sinopse: $synopsis<br>";
            echo "<img src='$cover' alt='Capa do Livro'><br>";
            echo "<hr>";
            if($cover=='Sem capa disponível')
            $cover="'capas/semcapa.jpg'";
        
            $sql = "INSERT INTO livros (ISBN, Titulo, Genero, resumo, Imagem) VALUES ('$isbn', '$title', '$categoria_encodada', '$synopsis', '$cover')";

            // Executa a consulta
            if (mysqli_query($con, $sql)) {
                echo "Registro inserido com sucesso!";
            } else {
                echo "Erro ao inserir registro: " . mysqli_error($con);
            }
            
            
            
            
            
        }
    }
}


?>
