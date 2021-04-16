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
        <h2>Listar Livros Registados</h2>
        <a href="../index.html"><button class="button">Voltar</button></a>

        <?php
            $liga = mysqli_connect('localhost','root');

            if(!$liga){
                echo "<h2>Essa não! Houve uma falha na ligação ao servidor!</h2>";
                exit;
            }

            mysqli_select_db($liga,'rcm7proj_17lara');
            $consulta = "select * from livros";
            $resultado = mysqli_query($liga,$consulta);
            $nregistos = mysqli_num_rows($resultado);

            echo "Foram encontrados $nregistos registos.";
        ?>
    </div>
    <hr>

    <table border="1">
        <tr>
            <td>ID</td>
            <td>ISBN</td>
            <td>Título</td>
            <td>Autor</td>
            <td>Categoria</td>
            <td>Ano</td>
            <td>Editora</td>
            <td>Editar</td>
            <td>Apagar</td>
        </tr>

    <?php
        for ($i=0; $i<$nregistos; $i++){
            $registo = mysqli_fetch_assoc($resultado);
            echo '<tr>';
            echo '<td>'.$registo['id'].'</td>';
            echo '<td>'.$registo['isbn'].'</td>';
            echo '<td>'.$registo['titulo'].'</td>';
            echo '<td>'.$registo['autor'].'</td>';
            echo '<td>'.$registo['categoria'].'</td>';
            echo '<td>'.$registo['ano'].'</td>';
            echo '<td>'.$registo['editora'].'</td>';
            echo '<td><a href="atualizar.php?id='.$registo['id'].'"> Atualizar </a></td>';
            echo '<td><a href="apagar.php?id='.$registo['id'].'"> Apagar </a></td>';
            echo '</tr>';
        }
    ?>
    </table>
</body>
</html>