<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    use App\utils\FlashMessages;
    use App\dao\LoginDAO;

    if($_POST['verificacao']!='verificado'){
        VerifyLogin::login();
    }

    $email= strtolower($_POST['email']);
    $senha= $_POST['senha'];

    $stmt= LoginDAO::getByEmail($email);
    $con= $stmt->fetch(PDO::FETCH_OBJ);

    if($con && password_verify($senha, $con->senha)){
        $_SESSION['email']=$email;
        $_SESSION['senha']=$senha;
        FlashMessages::setMessage("Bem-vindo ". $con->nome . '  ' . ':)');
        header("Location: /");
    }else{
        FlashMessages::setMessage('Email e/ou Senha Inválidos','error');
        header("Location: /login/");
    }

?>