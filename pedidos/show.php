<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\utils\VerifyLogin;
    VerifyLogin::login();

    use App\dao\PedidoDAO;
    use \PDO;

    $stmt= PedidoDAO::getById($_GET['id']);
    $pedido= $stmt->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <?php include ("../partials/_head.php")?>
</head>
<body>
    <?php include("../partials/_header.php")?>
    <section id="content">
        <div class="container">
            <?php include("../partials/_flash_messages.php")?>
            
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 show-pedido">
                    <h2>Visualização de Pedido 
                        <a href="/pedidos/destroy.php?id=<?= $pedido->id?>" class="btn btn-danger float-right" 
                            onclick="return confirm('você realmente deseja excluir esse pedido?')">Excluir</a>
                        <a href="/pedidos/edit.php?id=<?= $pedido->id?>" class="btn btn-warning float-right">Editar</a>
                    </h2>

                    <dl>
                        <dt>Nome Completo</dt>
                        <dd><?=$pedido->nome?></dd>

                        <dt>Produto</dt>
                        <dd><?=$pedido->nome_produto?></dd>

                        <dt>Quantidade_Kg</dt>
                        <dd><?=$pedido->qtd_kg?>Kg</dd>

                        <dt>Limpeza</dt>
                        <?php if($pedido->limpeza==0) :?>
                            <dd>Não</dd>
                        <?php else :?>
                            <dd>Sim</dd>
                        <?php endif ?> 

                        <dt>Preço</dt>
                        <dd>R$<?=$pedido->preco?></dd>

                        <dt>Observações do cliente:</dt>
                        <dd><?=$pedido->mensagem?></dd>
                    </dl>   
                </div>
            </div>
        </div>
    </section>

    <?php include("../partials/_javascript_import.php")?>
</body>
</html>