<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::login();

    use App\dao\LoginDAO;
    use App\utils\FlashMessages;

    $id=$_POST['id'];
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $cpf=$_POST['cpf'];
    $telefone=$_POST['telefone'];

    FlashMessages::setMessage('Cadastro atualizado com sucesso');
    LoginDAO::update($id, $nome, $email, $cpf, $telefone);
    header("Location: /login/cadastros.php");
?>