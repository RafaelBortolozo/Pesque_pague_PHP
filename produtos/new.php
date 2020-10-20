<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::login();
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
                    <h2>Cadastro de Produtos</h2>

                    <form action="/produtos/create.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="nome" name="nome"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagem" class="col-sm-2 col-form-label">imagem:</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="imagem" name="imagem"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preco" class="col-sm-2 col-form-label">Preço:</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="preco" name="preco"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="limpavel" class="col-sm-2 col-form-label">Permitir limpeza?</label>
                            <div class="col-sm-1 checkbox">
                                <input type="checkbox" class="form-control" id="limpavel" name="limpavel"/>
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