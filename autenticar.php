<?php
$email = $_POST["email"];
$senhalimpa = $_POST["senha"];

$senha = hash("sha256", $senhalimpa);

$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";

include_once "classes/conexao.php";
$resultado = $conexao->prepare($sql);
$resultado->bindParam(':email', $email);
$resultado->bindParam(':senha', $senha);
$resultado->execute();
$linha = $resultado->fetch();

if ($linha && $linha['tipo'] == 2) {
    session_start();
    $_SESSION['userid'] = $linha['id'];
    $_SESSION['usuario_logado'] = $linha['email'];
    $_SESSION['tipo_usuario'] = $linha['tipo'];
    header('Location: inserircomentario.php');
    exit;
} elseif($linha && $linha['tipo'] == 1) {
    session_start();
    $_SESSION['userid'] = $linha['id'];
    $_SESSION['usuario_logado'] = $linha['email'];
    $_SESSION['tipo_usuario'] = $linha['tipo'];
    header('Location: adm.php');
    exit;
}else{
    header('Location: erro.php');
    exit;
}
?>
