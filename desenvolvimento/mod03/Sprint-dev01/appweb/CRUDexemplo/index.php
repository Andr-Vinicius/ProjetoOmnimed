<?php

    include 'controle/CategoriaDAO.php';
    $dao = new CategoriaDAO();
    $dados = $dao->listarDados();

?>

<!DOCTYPE html>
<html>

    <head>
        <title>CRUD - MODELO</title>
    </head>

    <body>

        <h2>Exemplo CRUD</h2>
        <h2>Cadastro de Categorias</h2>

        <form action="cadastrarCategoria.php" method="POST">

            <label>Nome:</label>
            <input type="text" name="nome"  id="nome" placeholder="Escreva o nome da categoria">
            <br/>

            <label>Descrição:</label>
            <textarea name="descricao" id="descricao" placeholder="Escreva a descrição da categoria"></textarea>
            <br/>

            <button type="submit">Enviar</button>

        </form>

        <br/><br/><br/><br/>

        <h1>Listagem de dados da Tabela</h1>
        <?php if ( count( $dados ) == 0 ) { ?>

            <h3>Nenhum dado encontrado</h3>

        <?php } else { ?>

            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Descrição</td>
                        <td>Ação</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $dados as $dado ) { ?>
                        <tr>
                            <td><?php echo $dado['ctg_id']; ?></td>
                            <td><?php echo $dado['ctg_nome']; ?></td>
                            <td><?php echo $dado['ctg_descricao']; ?></td>
                            <td><a href="editarCategoria.php?id=<?php echo $dado['ctg_id'];?>">Editar</a></td>
                            <td><a href="excluirCategoria.php?id=<?php echo $dado['ctg_id'];?>">Excluir</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        <?php } ?>

    </body>

</html>