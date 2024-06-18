<?php
    require_once "classes/Usuario.php";

    $id=$_POST['id'];
    $usuario= new Usuario($id);

    $usuario->nome=$_POST['nome'];
    $usuario->email=$_POST['email'];
    $usuario->senha=hash("sha256",$_POST['senha']);
    $usuario->tipo=$_POST['tipo'];

    $usuario->atualizar();
    header('Location:listausuarios.php');
?>