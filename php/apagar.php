<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <title>Listar Livros Registados</title>
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
        <h2>Apagar Registos</h2>
        <a href="listar.php"><button class="button">Voltar</button></a><br>

        <?php
            $id = $_GET['id'];
            $liga = mysqli_connect('localhost','root');

            if(!$liga){
                echo "<h2>Essa não! Houve uma falha na ligação ao servidor!</h2>";
                exit;
            }

            mysqli_select_db($liga,'rcm7proj_17lara');
            $consulta = "delete from livros where id = '$id'";
            $resultado = mysqli_query($liga,$consulta);

            if(mysqli_affected_rows($liga) != 0){
                echo "O livro foi apagado com sucesso.";
            }
            else{
                echo "<br>Ocorreu um erro ao apagar o livro.";
            }
        ?>
</body>
</html>