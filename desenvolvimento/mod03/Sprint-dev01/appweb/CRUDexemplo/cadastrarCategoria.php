<?php

require_once "modelo/Categoria.php";
require_once "controle/CategoriaDAO.php";

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];

$categoria = new Categoria();
$categoria->setNome($nome);
$categoria->setDescricao($descricao);

$dao = new CategoriaDAO();
$dao->cadastrar($categoria);

header("location:index.php");
