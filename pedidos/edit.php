<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::login();

    $id= $_GET['id'];

    use App\dao\PedidoDAO;
    use App\dao\ProdutoDAO;
    $stmt= PedidoDAO::getById($id);
    $con= $stmt->fetch(PDO::FETCH_OBJ);

    $stm= ProdutoDAO::getAll();

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
                    <h2>Edição de Pedido</h2>

                    <form action="/pedidos/update.php" method="POST">
                        <input type="hidden" name="id" value="<?=$id?>">
                        <div class="form-group row">
                            <label for="nome" class="col-sm-2 col-form-label my-auto">Nome Completo:</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="nome" name="nome" value="<?=$con->nome?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="produto" class="col-sm-2 col-form-label my-auto">Produto:</label>
                            <div class="col-sm-10 my-auto">
                                <select required class="form-control" name="id_produto" id="produto">
                                    <?php while($row = $stm->fetch(PDO::FETCH_OBJ)) : ?>
                                        <?php if($con->id_produto==$row->id) :?>
                                            <option selected value="<?=$row->id?>"> <?=$row->nome?> </option>
                                        <?php else :?>
                                            <option value="<?=$row->id?>"> <?=$row->nome?> </option>
                                        <?php endif?>
                                    <?php endwhile ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="qtd_kg" class="col-sm-2 col-form-label my-auto">Quantidade (Kg):</label>
                            <div class="col-sm-10 my-auto">
                                <input required type="text" class="form-control" id="qtd_kg" name="qtd_kg" value="<?=$con->qtd_kg?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="limpeza" class="col-sm-2 col-form-label my-auto">Limpeza (+R$1,00/Kg):</label>
                            <div class="col-sm-1 my-auto">
                                <?php if($con->limpeza==0) :?>
                                    <input type="checkbox" class="form-control" id="limpeza" name="limpeza"/>
                                <?php else :?>
                                    <input type="checkbox" class="form-control" id="limpeza" name="limpeza" checked/>
                                <?php endif?>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="data_entrega" class="col-sm-2 col-form-label my-auto">Data de entrega:</label>
                            <div class="col-sm-4 my-auto">
                                <input required type="date" class="form-control" id="data_entrega" name="data_entrega" value="<?=$con->data_mysql?>"/>
                            </div>
                            <label for="horario_entrega" class="col-sm-2 col-form-label my-auto">Horário(24h):</label>
                            <div class="col-sm-4 my-auto">
                                <input required type="time" class="form-control" id="horario_entrega" name="horario_entrega" value="<?=$con->horario?>"/>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mensagem" class="col-sm-2 col-form-label">Observações (opcional):</label>
                            <div class="col-sm-10 my-auto">
                                <textarea name="mensagem" id="mensagem" cols="30" rows="10"><?=$con->mensagem?></textarea>
                            </div>
                        </div>
                        
                        <input type="submit" value="Cadastrar" class="btn btn-info float-right">
                    </form>   
                </div>
            </div>
        </div>
    </section>
    <?php include("../partials/_javascript_import.php")?>
    <script>
        $(document).ready(() => {
            if($("#produto").val()==4){
                    $("#limpeza-row").hide();
            }

            $("#produto").change(function() {
                if($(this).val()==4){
                    $("#limpeza-row").hide();
                }else{
                    $("#limpeza-row").show();
                }
            });
        });
    </script>
</body>
</html>