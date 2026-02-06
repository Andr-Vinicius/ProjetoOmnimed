<?php

$de = $_POST['email'];
$assunto = $_POST['subject'];
$mensagem = $_POST['message'];
$headers = 'From: ' . $de;

mail('omnimed@gmail.com', $assunto, $mensagem, $headers);

?>