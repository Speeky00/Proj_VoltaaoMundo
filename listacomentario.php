<?php
require_once "classes/Comentario.php";
$comentario=new Comentario();
$lista=$comentario->listar();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/pgini.css">
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <title>Venha conhecer a França!</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col text-center" id="header" style="background-color:#0055a4; color: #FFFFFF; font-family: 'Open Sans', sans-serif;">
                <div class="header d-flex justify-content-center align-items-center">
                    <img src="img/bandeira-franca.png" alt="bandeira-franca">
                    <h1 style="font-size: 30px;">França - Beleza e Cultura</h1>
                    <img src="img/bandeira-franca.png" alt="bandeira-franca">
                </div>
            </div>
        </div>
    </div> 

    <div id="wrapper" class="toggled">
        <div id="page-content-wrapper">
        <div class="container-fluid m-2">
            <center><h1>Lista de Comentários</h1></center>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2 p-2">
                <div class="list-group">
                    <?php foreach ($lista as $linha): ?>
                        <div class="list-group-item">
                            <H5 class="mb-1"><?php echo $linha['comentario']; ?></H5>
                            <p class="mb-1"><?php echo $linha['email']; ?></p>
                        </div>
                        <br>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="container"><center>
            <a href="login.php"><button type="button" class="btn btn-primary">Novo Comentário</button></a>
            <a href="pagina-inicial.html"><button type="button" class="btn btn-primary">Voltar</button></a>
                    </center></div>
        </div>

    <div class="container-fluid">
    <footer class="footer text-center py-1 fixed-bottom"style="background-color:#0055a4; color: #FFFFFF; font-family: 'Open Sans', sans-serif;">
        <p class="m-0"><strong>Projeto Volta ao Mundo - Desenvolvimento Web III</strong></p>
    </footer>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="script/scr01.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
