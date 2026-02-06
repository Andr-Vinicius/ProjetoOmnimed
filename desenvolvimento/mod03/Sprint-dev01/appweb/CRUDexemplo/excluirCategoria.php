<?php

require_once "modelo/Categoria.php";
require_once "controle/CategoriaDAO.php";

$id = $_GET['id'];

$categoria = new Categoria();
$categoria->setId($id);

$dao = new CategoriaDAO();
$dao->excluir($categoria);

header("location:index.php");
