<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
    
    use App\utils\VerifyLogin;
    VerifyLogin::login();
    
    use App\dao\ProdutoDAO;
    use App\utils\ImageUpload;
    use App\utils\FlashMessages;
    
    
    $id= $_POST['id'];
    $nome= $_POST['nome'];
    $preco= $_POST['preco'];
    
    $limpavel=NULL;
    if($_POST['limpavel']==NULL){
        $limpavel=0;
    }else{
        $limpavel=1;
    }
    
    $imageUpload = new ImageUpload();
    $imageUpload->pasta_alvo = " /img/";
    $imageUpload->nome = $nome; // nome que quer colocar na imagem.
    $imageUpload->imagem = $_FILES['imagem']; // direto do form html
    $imageUpload->extensoes_habilitadas = array("jpeg", "jpg", "png");

    $return = $imageUpload->upload();

    if($return !== true){
        FlashMessages::setMessage($return, "error");
        header("Location: /produtos/edit.php?id=$id");
        exit(0);
    }

    $return = ProdutoDAO::update($id, $nome, $preco, $imageUpload->uri, $limpavel);
    FlashMessages::setMessage("Produto atualizado com sucesso");
    header("Location: /produtos/");

?>