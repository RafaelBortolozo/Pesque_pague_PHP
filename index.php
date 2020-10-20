<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\utils\VerifyLogin;
    use App\dao\ProdutoDAO;
    VerifyLogin::login();
    $stmt_produtos= ProdutoDAO::getAll();

?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include("partials/_head.php")?>
</head>
<body>
    <?php include("partials/_header.php")?>
    <section id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 float-center">
                    <?php include("partials/_flash_messages.php")?>
                    <h2>Produtos</h2>
                    <div class="row">
                        <?php while($produto = $stmt_produtos->fetch(PDO::FETCH_OBJ)) : ?>
                            <div class="col-md-4 produto">
                                <div class="border">
                                    <h5><?= $produto->nome?></h5>
                                    
                                    <?php if($produto->url_imagem_produto) : ?>
                                        <img src="<?=$produto->url_imagem_produto?>" alt="<?= $produto->nome?>"/>
                                    <?php else : ?>
                                        <img src="/img/no-image.jpg">
                                    <?php endif?>
                                    
                                    <p>Preço: R$<?=$produto->preco?>/Kg</p>
                                    <a href="/pedidos/new.php?id_produto=<?=$produto->id?>" class="btn btn-success">Comprar</a>
                                </div>
                            </div>
                        <?php endwhile?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include("partials/_javascript_import.php")?>
</body>
</html>