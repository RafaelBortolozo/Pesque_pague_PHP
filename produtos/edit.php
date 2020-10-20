<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\utils\VerifyLogin;
    VerifyLogin::login();

    use App\dao\ProdutoDAO;
    use App\utils\FlashMessages;

    $id= $_GET['id'];
    
    $stmt_prod= ProdutoDAO::getById($id);
    $produto = $stmt_prod->fetch(PDO::FETCH_OBJ);

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
                    <h2>Edição de produto</h2>

                    <form action="/produtos/update.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value= <?= $produto->id ?> >
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="nome" name="nome" value="<?= $produto->nome?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagem" class="col-sm-2 col-form-label">imagem</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control-file" id="imagem" name="imagem"/>
                                <br/>
                                <?php if($produto->url_imagem_produto) : ?>
                                    <img src="<?=$produto->url_imagem_produto?>" alt="<?= $produto->nome?>"/>
                                <?php else : ?>
                                    <img src="/img/no-image.png">
                                <?php endif?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="preco" class="col-sm-2 col-form-label">Preço</label>
                            <div class="col-sm-10">
                                <input required type="text" class="form-control" id="preco" name="preco" value="<?= $produto->preco?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="limpavel" class="col-sm-2 col-form-label">Permitir limpeza?</label>
                            <div class="col-sm-1 checkbox">
                                <?php if($produto->limpavel==0) :?>
                                    <input type="checkbox" class="form-control" id="limpavel" name="limpavel"/>
                                <?php else :?>
                                    <input type="checkbox" class="form-control" id="limpavel" name="limpavel" checked/>
                                <?php endif?>
                            </div>
                        </div>

                        <input type="submit" value="Atualizar" class="btn btn-success float-right">
                    </form>   
                </div>
            </div>
        </div>
    </section>

    <?php include("../partials/_javascript_import.php")?>

</body>
</html>