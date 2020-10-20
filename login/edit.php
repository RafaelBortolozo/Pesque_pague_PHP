<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::login();

    use App\dao\LoginDAO;
    $stmt= LoginDAO::getById($_GET['id']);
    $con= $stmt->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("../partials/_head.php")?>
</head>
<body>
    <?php include("../partials/_header.php")?>
    <section id="content">
        <div class="container">
            <?php include("../partials/_flash_messages.php")?>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h2>Edição de Cadastro</h2>

                    <form action="/login/update.php" method="POST">
                        <input type="hidden" name="id" value="<?=$_GET['id']?>">
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label my-auto">Nome Completo:</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="nome" name="nome" value="<?=$con->nome?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label my-auto">Email:</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="email" name="email" value="<?=$con->email?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-sm-2 col-form-label my-auto">CPF (Apenas Números):</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="cpf" name="cpf" value="<?=$con->cpf?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefone" class="col-sm-2 col-form-label my-auto">Telefone:</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="telefone" name="telefone" value="<?=$con->telefone?>"/>
                            </div>
                        </div>

                        <input type="submit" value="Cadastrar" class="btn btn-info float-right">
                    </form>   
                </div>
            </div>
        </div>
    </section>

    <?php include("../partials/_javascript_import.php")?>
</body>
</html>