<?php
include 'controle/CategoriaDAO.php';
include 'modelo/Categoria.php';
$cat = new Categoria();
$cat->setId($_REQUEST['id']);
$dao = new CategoriaDAO();
$dado = $dao->obterPorId($cat);
?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta http-equiv="Content-Language" content="ptBR">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, inicial-scale=1, maximum-scale=1, user-scalabel=no, shrink-to-fit=no">

    <title>CRUD - MODELO</title>
</head>

<body>
    <h2>Editar Categoria</h2>
    <form action="editarCategoria.php" method="POST">
        <label>Nome da Categoria</label>
        <input type="text" name="nome" id="nome" value="<?php echo $dado['ctg_nome'] ?>">
        <br />
        <label>Descrição</label><br />
        <textarea name="descricao" id="descricao" value="<?php echo $dado['ctg_descricao'] ?>"></textarea>
        <br />
        <input type="submit" value="Gravar">
    </form>
</body>

</html>