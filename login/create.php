<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    use App\utils\FlashMessages;
    use App\dao\LoginDAO;

    VerifyLogin::login();

    $nome= $_POST['nome'];
    $email= strtolower($_POST['email']);
    $senha_hash= password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $cpf= $_POST['cpf'];
    $telefone= $_POST['telefone'];

    $stmt= LoginDAO::getByEmail($email);
    while($con= $stmt->fetch(PDO::FETCH_OBJ)){
        if($con->email==$email){
            FlashMessages::setMessage('Esse email já está cadastrado', 'error');
            header("Location: /login/new.php");
            exit(0);
        }
    }

    FlashMessages::setMessage("Cadastro realizado com sucesso");
    LoginDAO::create($nome, $email, $senha_hash, $cpf, $telefone);
    header("Location: /login/cadastros.php");
?>