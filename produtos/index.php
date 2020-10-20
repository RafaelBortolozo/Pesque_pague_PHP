<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    use App\dao\ProdutoDAO;
    
    VerifyLogin::login();

    $stmt= ProdutoDAO::getAll();
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
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h2>Produtos <a href="/produtos/new.php" class="btn btn-success float-right">Novo Produto</a></h2>
                    
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Nome</th>
                            <th>Preço</th>
                            <th>Limpável</th>
                            <th>AÇÕES</th>
                        </tr>
                        <?php while($row = $stmt->fetch(PDO::FETCH_OBJ)) : ?>
                            <tr>
                                <td class="align-middle"><?= $row->id ?></td>
                                <td class="align-middle">
                                    <?php if($row->url_imagem_produto) : ?>
                                        <img src="<?=$row->url_imagem_produto?>" alt="<?= $row->nome?>"/>
                                    <?php else : ?>
                                        <img src="/img/no-image.jpg">
                                    <?php endif?>
                                </td>
                                <td class="align-middle"><?= $row->nome ?></td>
                                <td class="align-middle">R$<?=$row->preco?>/Kg</td>

                                <?php if(($row->limpavel)==1) :?>
                                    <td class="align-middle">Sim</td>
                                <?php else :?>
                                    <td class="align-middle">Não</td>
                                <?php endif?>
                                
                                <td class="align-middle">
                                    <a href="/produtos/edit.php?id=<?=$row->id?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/produtos/destroy.php?id=<?=$row->id?>" class="btn btn-sm btn-danger" 
                                       onclick="return confirm('você realmente deseja excluir o produto (<?=$row->id?>-<?=$row->nome?>) ?')">Excluir</a>
                                </td>
                            </tr>
                        <?php endwhile ?>
                        
                    </table>

                </div>
            </div>
        </div>
    </section>

    <?php include("../partials/_javascript_import.php")?>

</body>
</html>