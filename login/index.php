<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::logout();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("../partials/_head.php")?>
    <link rel="stylesheet" href="../css/login.css" />
</head>
<body>
    <div id="login">
        <div class="container">
        <h1 class="text-center"><img src="/img/logo.jpg" alt=""></h3>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <?php include("../partials/_flash_messages.php")?>
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="/login/verify.php" method="POST">
                            <input type="hidden" name="verificacao" value="verificado">
                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input required type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="senha" class="text-info">Senha:</label><br>
                                <input required type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Entrar">
                                <a href="/login/new.php" class="btn btn-info float-right">Novo usuário? clique aqui</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../partials/_javascript_import.php")?>
</body>
</html>
