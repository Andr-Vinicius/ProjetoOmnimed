<?php

require_once "modelo/Categoria.php";
require_once "controle/CategoriaDAO.php";

$id = $_REQUEST['id'];
$nome = $_REQUEST['nome'];
$descricao = $_REQUEST['descricao'];

$categoria = new Categoria();
$categoria->setId($id);
$categoria->setNome($nome);
$categoria->setDescricao($descricao);

$dao = new CategoriaDAO();
$dao->editar($categoria);

header("location:index.php");
