<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <title>Atualizar Livro</title>
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="../index.html">Inserir Livros</a></li>
            <li><a href="listar.php">Listar Livros</a></li>
            <li><a href="../pglivros.html">Pesquisar Livros</a></li>
            <li><a href="../pgautores.html">Pesquisar Autores</a></li>
        </ul><br>
    </div>

    <div>
        <h2>Atualizar Livro</h2>
        <a href="listar.php"><button class="button">Voltar</button></a>

        <?php
            $id = $_POST['idlivro'];
            $isbn = $_POST['isbn'];
            $titulo = $_POST['titulo'];
            $autor = $_POST['autor'];
            $categoria = $_POST['categoria'];
            $ano = $_POST['ano'];
            $editora = $_POST['editora'];

            $liga = mysqli_connect('localhost','root');

            if(!$liga){
                echo "<h2>Essa não! Houve uma falha na ligação ao servidor!</h2>";
                exit;
            }

            mysqli_select_db($liga,'rcm7proj_17lara');
            $consulta = "UPDATE `livros` SET `isbn`='$isbn',`titulo`='$titulo',`autor`='$autor',`categoria`='$categoria',`ano`='$ano',`editora`='$editora' WHERE `id` = '$id'";
            $resultado = mysqli_query($liga,$consulta);

            if(mysqli_affected_rows($liga) != 0){
                echo "O livro foi atualizado com sucesso.";
            }
            else{
                echo "Ocorreu um erro ao atualizar o livro.";
            }
        ?>
</body>
</html>