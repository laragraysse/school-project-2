<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pesquisar Livros</title>
</head>
<body>
    <div>
        <h2>Resultados da Pesquisa: </h2>

        <?php
            $titulo = $_POST['titulo'];

            if(!$titulo){
                echo "Volte atrás e escreva o título do livro!";
                exit;
            }

            echo "<p> Título procurado: $titulo </p>";

            $liga = mysqli_connect('localhost','root');

            if(!$liga){
                echo "<h2>Opa! Ocorreu um erro ao tentar se conectar ao servidor!</h2>";
                exit;
            }

            mysqli_select_db($liga,'rcm7proj_17lara');
            $procura = "select * from livros where titulo like '%".$titulo."%'";
            $resultado = mysqli_query($liga,$procura);
            $nregistos = mysqli_num_rows($resultado);

            echo "Foram encontrados $nregistos registos.";
        ?>
    </div>

    <hr>

    <table border="1">
        <tr>
            <td>ID: </td>
            <td>ISBN: </td>
            <td>Título: </td>
            <td>Autor: </td>
            <td>Categoria: </td>
            <td>Ano de Lançamento: </td>
            <td>Editora: </td>
        </tr>

    <?php
        for($i=0; $i<$nregistos; $i++){
            $registo = mysqli_fetch_assoc($resultado);
            echo '<tr>';
            echo '<td>'.$registo['id'].'</td>';
            echo '<td>'.$registo['isbn'].'</td>';
            echo '<td>'.$registo['titulo'].'</td>';
            echo '<td>'.$registo['autor'].'</td>';
            echo '<td>'.$registo['categoria'].'</td>';
            echo '<td>'.$registo['ano'].'</td>';
            echo '<td>'.$registo['editora'].'</td>';
            echo '<tr>';
        }
    ?>
 </table>

</body>
</html>