<?php
$url = 'dados.json';
$json = file_get_contents($url);
$data = json_decode($json, true);

foreach ($data as $usuario) {
    echo "<h4>-----------</h4>";
    echo "Nome: {$usuario['nome']}<br>";
    echo "Email: {$usuario['email']}<br>";
    echo "Comentario:<br>";

    foreach ($usuario['comentario'] as $comentario) {
        echo "{$comentario['comentario']}<br>";
    }
}
?>
