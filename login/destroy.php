<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::login();
    
    use App\utils\FlashMessages;
    use App\dao\LoginDAO;

    $stmt= LoginDAO::getById($_GET['id']);
    $con= $stmt->fetch(PDO::FETCH_OBJ);
    
    LoginDAO::delete($_GET['id']);

    if(($_SESSION['email']==$con->email) && ($_SESSION['senha']==$con->senha)){
        FlashMessages::setMessage('Cadastro excluído com sucesso');
        header("Location: /login");
    }else{
        FlashMessages::setMessage('Cadastro excluído com sucesso');
        header("Location: /login/cadastros.php");
    }
    
?>