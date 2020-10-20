<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

    use App\utils\VerifyLogin;
    VerifyLogin::login();

    use App\dao\PedidoDAO;
    use App\dao\ProdutoDAO;
    use App\utils\FlashMessages;
    use \PDO;

    $nome=$_POST['nome'];
    $id_produto=$_POST['id_produto'];
    $qtd_kg=$_POST['qtd_kg'];
    $limpeza=$_POST['limpeza'];
    $data_entrega=$_POST['data_entrega'];
    $horario_entrega=$_POST['horario_entrega'];
    $mensagem=$_POST['mensagem'];
    $preco=NULL;

    $stmt= ProdutoDAO::getById($id_produto);
    $con = $stmt->fetch(PDO::FETCH_OBJ);
    $preco_produto= $con->preco;
    
    //concatenação de data e horário
    $data_entrega= $data_entrega . " " . $horario_entrega;

    //calcula o preço
    if($limpeza==NULL || $con->limpavel==0){
        $preco= $preco_produto*$qtd_kg;
        $limpeza=0;
    }else{
        $preco= ($preco_produto+1)*$qtd_kg;
        $limpeza=1;
    }
    
    PedidoDAO::create($nome, $id_produto, $qtd_kg, $limpeza, $data_entrega, $mensagem, $preco);
    FlashMessages::setMessage("Pedido cadastrado com sucesso");
    header("Location: /pedidos/");
    
?>