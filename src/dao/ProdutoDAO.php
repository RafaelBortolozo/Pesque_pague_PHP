<?php
    namespace App\dao;
    use App\utils\ConnectionFactory;
    use \PDO;
    
    class ProdutoDAO{
        public static function getAll(){
            $con= ConnectionFactory::getConnection();
            $stmt = $con->prepare("SELECT * FROM produtos");
            $stmt->execute();

            return $stmt;
        }

        public static function getById($id){
            $con= ConnectionFactory::getConnection();

            $stmt = $con->prepare("SELECT * FROM produtos WHERE id= :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt;
        }

        public static function create($nome, $preco, $imagem, $limpavel){
            $con= ConnectionFactory::getConnection();

            $stmt = $con->prepare("INSERT INTO produtos (nome, preco, url_imagem_produto, limpavel) 
                                   VALUES (:nome, :preco, :url_imagem_produto, :limpavel)");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':url_imagem_produto', $imagem, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':limpavel', $limpavel, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public static function update($id, $nome, $preco, $imagem, $limpavel){
            $con= ConnectionFactory::getConnection();

            $stmt = $con->prepare("UPDATE produtos SET nome= :nome, preco= :preco, url_imagem_produto= :url_imagem_produto, limpavel= :limpavel WHERE id= :id");
            

            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':url_imagem_produto', $imagem, PDO::PARAM_STR);
            $stmt->bindParam(':preco', $preco, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':limpavel', $limpavel, PDO::PARAM_INT);
            return $stmt->execute();
        }

        public static function delete($id){
            $con= ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM produtos WHERE id= :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }
?>