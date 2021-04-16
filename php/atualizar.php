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
        <h2>Atualizar Livro</h2>
        <a href="../index.html"><button class="button">Voltar</button></a>

        <?php
            $id = $_GET['id'];
            $liga = mysqli_connect('localhost','root');

            if(!$liga){
                echo "<h2>Essa não! Houve uma falha na ligação ao servidor!</h2>";
                exit;
            }

            mysqli_select_db($liga,'rcm7proj_17lara');
            $consulta = "select * from livros where id = '$id'";
            $resultado = mysqli_query($liga,$consulta);
            $array = mysqli_fetch_array($resultado);
        ?>

        <form class="form" method="POST" action="atualizar2.php" onsubmit = "document.getElementById('id').disabled = false;">
                            
            <div class="formlinha">
                <label for="idlivro">ID: </label>
                <input name="idlivro" id="id" type="text" value="<?php echo $array['id']; ?>" disabled>
            </div>
                                    
            <div class="formlinha">
                <label for="isbn">ISBN: </label>
                <input name="isbn" id="isbn" type="text" value="<?php echo $array['isbn']; ?>">
            </div>
                                    
            <div class="formlinha">
                <label for="titulo">Título: </label>
                <input name="titulo" id="titulo" type="text" value="<?php echo $array['titulo']; ?>">
            </div>
                                    
            <div class="formlinha">
                <label for="autor">Autor: </label>
                <input name="autor" id="autor" type="text" value="<?php echo $array['autor']; ?>">
            </div>
                                    
            <div class="formlinha">
                <label for="categoria">Categoria: </label>
                <input name="categoria" id="categoria" type="text" value="<?php echo $array['categoria']; ?>">
            </div>
                                    
            <div class="formlinha">
                <label for="ano">Ano de Lançamento: </label>
                <input name="ano" id="ano" type="text" value="<?php echo $array['ano']; ?>">
            </div>
                                    
            <div class="formlinha">
                <label for="editora">Editora: </label>
                <input name="editora" id="editora" type="text" value="<?php echo $array['editora']; ?>">
            </div>
            <br>
                            
            <div class="formlinha">
                <input class="button" type="submit" value="Guardar">
                <input class="button" type="reset" value="Limpar">
            </div>
                                            
        </form>
    </div>

</body>
</html>