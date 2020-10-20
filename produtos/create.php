<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::login();

    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;
    use App\dao\ProdutoDAO;
    use App\utils\ImageUpload;
    use App\utils\FlashMessages;

    // create a log channel
    $log = new Logger('pesquepague-log');
    $log->pushHandler(new StreamHandler($_SERVER['DOCUMENT_ROOT'] . '/logs/app.log', Logger::WARNING));

    $nome=$_POST['nome'];
    $preco=$_POST['preco'];
    
    $imageUpload = new ImageUpload();
    $imageUpload->pasta_alvo = " /img/";
    $imageUpload->nome = $nome; // nome que quer colocar na imagem.
    $imageUpload->imagem = $_FILES['imagem']; // direto do form html
    $imageUpload->extensoes_habilitadas = array("jpeg", "jpg", "png");

    $return = $imageUpload->upload();

    if($return !== true){
        FlashMessages::setMessage($return, "error");
        $log->warning('#1 - erro ao validar a imagem');
        $log->error('#2 - erro ao validar a imagem');
        header("Location: /produtos/new.php");
        exit(0);
    }

    $limpavel=NULL;
    if($_POST['limpavel']==NULL){
        $limpavel=0;
    }else{
        $limpavel=1;
    }


    ProdutoDAO::create($nome, $preco, $imageUpload->uri, $limpavel);
    FlashMessages::setMessage("Produto cadastrado com sucesso");
    header("Location: /produtos/");
    
?>