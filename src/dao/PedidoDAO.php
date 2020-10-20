<?php
    namespace App\dao;
    use App\utils\ConnectionFactory;
    use \PDO;

    class PedidoDAO{
        public static function getAll(){
            $con = ConnectionFactory::getConnection();
            $stmt= $con->prepare("SELECT pe.id, pe.nome, pe.id_produto, pe.mensagem, pe.qtd_kg, pe.limpeza, 
                                  pe.preco, DATE_FORMAT(pe.data_entrega, '%d/%m/%Y') as data, 
                                  TIME_FORMAT(pe.data_entrega, '%H:%i') as horario, pe.data_entrega, pr.nome as nome_produto
                                  
                                  FROM pedidos pe
                                  JOIN produtos pr
                                  on (pe.id_produto = pr.id) ORDER BY pe.data_entrega ASC");
            $stmt->execute();

            return $stmt;
        }

        public static function getById($id){
            $con = ConnectionFactory::getConnection();
            $stmt= $con->prepare("SELECT pe.id, pe.nome, pe.id_produto, pe.mensagem, pe.qtd_kg, pe.limpeza, 
                                        pe.preco, DATE_FORMAT(pe.data_entrega, '%Y-%m-%d') as data_mysql, DATE_FORMAT(pe.data_entrega, '%d/%m/%Y') as data , 
                                        TIME_FORMAT(pe.data_entrega, '%H:%i') as horario, pe.data_entrega, pr.nome as nome_produto
                                  
                                  FROM pedidos pe
                                  JOIN produtos pr on (pe.id_produto = pr.id) 
                                  WHERE pe.id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt;
        }
        
        public static function create($nome, $id_produto, $qtd_kg, $limpeza, $data_entrega, $mensagem, $preco){
            $con= ConnectionFactory::getConnection();
            $stmt = $con->prepare("INSERT INTO pedidos (nome, id_produto, mensagem, qtd_kg, limpeza, preco, data_entrega) 
                                   VALUES (:nome, :id_produto, :mensagem, :qtd_kg, :limpeza, :preco, :data_entrega)");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);
            $stmt->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $stmt->bindParam(':qtd_kg', $qtd_kg, PDO::PARAM_STR);
            $stmt->bindParam(':limpeza', $limpeza);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':data_entrega', $data_entrega, PDO::PARAM_STR);
            $stmt->execute();
            
            return $stmt;
        }

        public static function update($id, $nome, $id_produto, $qtd_kg, $limpeza, $data_entrega, $mensagem, $preco){
            $con= ConnectionFactory::getConnection();
            $stmt = $con->prepare("UPDATE pedidos SET nome= :nome, id_produto=:id_produto, mensagem=:mensagem, qtd_kg=:qtd_kg, 
                                          limpeza=:limpeza, preco=:preco, data_entrega=:data_entrega 
                                   WHERE id=:id");

            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);
            $stmt->bindParam(':mensagem', $mensagem, PDO::PARAM_STR);
            $stmt->bindParam(':qtd_kg', $qtd_kg, PDO::PARAM_STR);
            $stmt->bindParam(':limpeza', $limpeza);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':data_entrega', $data_entrega, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt;
        }

        public static function delete($id){
            $con = ConnectionFactory::getConnection();
            $stmt= $con->prepare("DELETE FROM pedidos WHERE id=:id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt;
        }

        
    }


?>