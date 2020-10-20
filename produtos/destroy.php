<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\utils\VerifyLogin;
    VerifyLogin::login();

    use App\dao\ProdutoDAO;
    use App\utils\FlashMessages;
    
    $id= $_GET['id'];
    
    $return= produtoDAO::delete($id);

    FlashMessages::setMessage("Produto excluído com sucesso");
    header("Location: /produtos/");
?>