<?php
require_once "classes/Comentario.php";

$comentario = new Comentario();
$comentario->comentario = $_POST['comentario'];
$comentario->userid = $_POST['userid'];
$comentario->status = 2;
$comentario->inserir();

header("refresh:0.8; url=comentarioinserido.php");
?>
