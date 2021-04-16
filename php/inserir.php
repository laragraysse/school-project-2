<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
    <title>Inserir Dados</title>
</head>
<body>
                    <div class="menu">
                        <ul>
                        <li><a href="index.html">Inserir Livros</a></li>
                            <li><a href="listar.html">Listar Livros</a></li>
                            <li><a href="pglivros.html">Pesquisar Livros</a></li>
                            <li><a href="pgautores.html">Pesquisar Autores</a></li>
                            <li><a href="pgapagar.html">Apagar Livros</a></li>
                            <li><a href="pgatualizar.html">Atualizar Livros</a></li>
                        </ul><br>
                    </div>
    <?php
            //Recebe os dados introduzidos no formulário
            $idLivro = $_POST["idlivro"];
            $isbn = $_POST["isbn"];
            $titulo = $_POST["titulo"];
            $autor = $_POST["autor"];
            $categoria = $_POST["categoria"];
            $ano = $_POST["ano"];
            $editora = $_POST["editora"];

            //Verifica se os campos estão vazios
            if(!$idLivro || !$isbn || !$titulo || !$autor || !$categoria || !$ano || !$editora){
                echo "Campos vazios. Preencha-os por favor.";
                exit;
            }
    ?>

<div>
    <?php
        //Mostra os dados introduzidos
            echo "<h3>Livro Registado.</h3>";
            echo "Dados recebidos: <br>";
            echo "ID: $idLivro<br>";
            echo "ISBN: $isbn<br>";
            echo "Título: $titulo<br>";
            echo "Autor: $autor<br>";
            echo "Categoria: $categoria <br>";
            echo "Ano de Lançamento: $ano <br>";
            echo "Editora: $editora <br>";
    ?>
</div>

        <?php
            //Configuração da ligação do servidor
                $ligardb = mysqli_connect('localhost', 'root');

                if(!$ligardb){
                    echo "<h2>Essa não! Ocorreu um erro ao tentar conectar ao servidor! Tente novamente.</h2>";
                    exit;
                }

                //Ligação à base de dados
                mysqli_select_db($ligardb,'rcm7proj_17lara');
                $inserir = "insert into livros values('$idLivro','$isbn','$titulo','$autor','$categoria','$ano','$editora')";
                $resultado = mysqli_query($ligardb, $inserir);

                //Verificação dos dados introduzidos
                if($resultado==1){
                    echo "<h2>Dados inseridos corretamente!</h2>";
                }
                else{
                    echo "<h3>Este registo já existe!</h3>";
                }
        ?>

        <hr>

        <a href="../index.html"><button class="button">Voltar</button></a>
        <a href="listar.php"><button class="button">Listar Registos</button></a>
        <a href="pesquisarautores.php"><button class="button">Pesquisar Autores</button></a>
        <a href="pesquisarlivros.php"><button class="button">Pesquisar Livros</button></a>

    </body>
</html>