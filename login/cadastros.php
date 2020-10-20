<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::login();

    use App\utils\FlashMessages;
    use App\dao\LoginDAO;

    $stmt= LoginDAO::getAll();

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
                    <h2>Cadastros<a href="/login/new.php" class="btn btn-success float-right">Novo Cadastro</a></h2>
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <th>Nome completo</th>
                            <th>Email</th>
                            <th>CPF</th>
                            <th>Telefone</th>
                            <th>Ações</th>
                        </tr>
                        <?php while ($con= $stmt->fetch(PDO::FETCH_OBJ)) :?>
                            <tr>
                                <td class="align-middle"><?=$con->id?></td>
                                <td class="align-middle"><?=$con->nome?></td>
                                <td class="align-middle"><?=$con->email?></td>
                                <td class="align-middle"><?=$con->cpf?></td>
                                <td class="align-middle"><?=$con->telefone?></td>
                                
                                <td class="align-middle">
                                    <a href="/login/edit.php?id=<?=$con->id?>" class="btn btn-sm btn-warning">Editar</a>
                                    <a href="/login/destroy.php?id=<?=$con->id?>" class="btn btn-sm btn-danger" 
                                        onclick="return confirm('Você realmente deseja excluir o cadastro <?=$con->id?>-<?=$con->nome?>?')">Excluir</a>
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