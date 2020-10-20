<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("../partials/_head.php")?>
</head>
<body>
    <section id="content">
        <div class="container">
            <?php include("../partials/_flash_messages.php")?>
            
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <h2>Cadastro</h2>

                    <form action="/login/create.php" method="POST">
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label my-auto">Nome Completo:</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="nome" name="nome"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label my-auto">Email:</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="email" name="email"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="senha" class="col-sm-2 col-form-label my-auto">Senha:</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="senha" name="senha"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cpf" class="col-sm-2 col-form-label my-auto">CPF (Apenas números):</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="cpf" name="cpf"/>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="telefone" class="col-sm-2 col-form-label my-auto">Telefone (celular):</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="telefone" name="telefone" />
                            </div>
                        </div>

                        <input type="submit" value="Cadastrar" class="btn btn-success float-right">
                    </form>   
                </div>
            </div>
        </div>
    </section>
</body>
</html>