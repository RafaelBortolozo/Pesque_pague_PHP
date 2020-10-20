<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::login();

    use App\dao\PedidoDAO;
    use App\dao\ProdutoDAO;

    $stmt= PedidoDAO::getAll();
    
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
                <div class="col-md-12">
                    <h2>Pedidos <a href="/pedidos/new.php" class="btn btn-success float-right">Novo Pedido</a></h2>

                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Nome completo</th>
                            <th>Produto</th>
                            <th>Quantidade_Kg</th>
                            <th>Limpeza</th>
                            <th>Preço</th>
                            <th>Data_entrega</th>
                            <th>Ações</th>
                        </tr>
                        <?php while ($pedido= $stmt->fetch(PDO::FETCH_OBJ)) :?>
                            <tr>
                                <td class="align-middle"><?=$pedido->id?></td>
                                <td class="align-middle"><?=$pedido->nome?></td>
                                <td class="align-middle"><?=$pedido->nome_produto?></td>
                                <td class="align-middle"><?=$pedido->qtd_kg?> Kg</td>
                                
                                <?php if(($pedido->limpeza)==1) :?>
                                    <td class="align-middle">Sim</td>
                                <?php else :?>
                                    <td class="align-middle">Não</td>
                                <?php endif?>

                                <td class="align-middle">R$<?=$pedido->preco?></td>
                                <td class="align-middle"><?=$pedido->data?> <?=$pedido->horario?></td>
                                <td class="align-middle acoes">
                                    <a href="/pedidos/edit.php?id=<?=$pedido->id?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/pedidos/destroy.php?id=<?=$pedido->id?>" class="btn btn-sm btn-danger" onclick="return confirm('Você realmente deseja excluir o pedido <?=$pedido->id?>-<?=$pedido->nome?> ?')">Excluir</a>
                                    <?php if($pedido->mensagem) :?>
                                        <a href="/pedidos/show.php?id=<?=$pedido->id?>" class="btn btn-sm btn-info">Observações</a>
                                    <?php endif?>
                                </td>
                            </tr>
                        <?php endwhile?>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <?php include("../partials/_javascript_import.php")?>
</body>
</html>