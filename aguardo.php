<?php
require_once "classes/Comentario.php";
$comentario = new Comentario();
$lista = $comentario->listarespera();
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
        <table border="3">
            <tr>
                <th>Email</th>
                <th>Comentários</th>
                <th>Ações</th>
            </tr>
            
            <?php foreach ($lista as $linha): ?>
                <tr>
                    <td><?php echo $linha['email']; ?></td>
                    <td><?php echo $linha['comentario']; ?></td>
                    <td>
                        <form action="alterarcomentario.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
                            <input type="hidden" name="acao" value="aceitar">
                            <button type="submit" class="btn btn-success">Aceitar</button>
                        </form>
                        <form action="alterarcomentario.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
                            <input type="hidden" name="acao" value="rejeitar">
                            <button type="submit" class="btn btn-danger">Rejeitar</button>
                        </form>
                    </td>                
                </tr>
            <?php endforeach; ?> 
        </table>
        <a href="login.php"><button type="button" class="btn btn-primary">Novo Comentário</button></a>
        <br>
        <a href="rejeitadas.php">Comentarios rejeitados</a><br>
        <a href="listaadm.php">Voltar</a>
        </div>
    </div>

    <div class="container-fluid">
        <footer class="footer text-center py-1 fixed-bottom" style="background-color:#0055a4; color: #FFFFFF; font-family: 'Open Sans', sans-serif;">
            <p class="m-0"><strong>Projeto Volta ao Mundo - Desenvolvimento Web III</strong></p>
        </footer>
    </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="script/scr01.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
