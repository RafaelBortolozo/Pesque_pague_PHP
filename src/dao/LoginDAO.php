<?php
    namespace App\dao;
    use App\utils\ConnectionFactory;
    use \PDO;
    
    class LoginDAO{
        
        public static function getAll(){
            $con = ConnectionFactory::getConnection();
            $stmt= $con->prepare("SELECT * FROM clientes ORDER BY nome ASC");
            $stmt->execute();

            return $stmt;
        }

        public static function getById($id){
            $con = ConnectionFactory::getConnection();
            $stmt= $con->prepare("SELECT * FROM clientes WHERE id= :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        }

        public static function getByEmail($email){
            $con = ConnectionFactory::getConnection();
            $stmt= $con->prepare("SELECT * FROM clientes WHERE email= :email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt;
        }

        public static function create($nome, $email, $senha, $cpf, $telefone){
            $con = ConnectionFactory::getConnection();
            $stmt= $con->prepare("INSERT INTO clientes (nome, email, senha, cpf, telefone) VALUES (:nome, :email, :senha, :cpf, :telefone)");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt;
        }

        public static function update($id, $nome, $email, $cpf, $telefone){
            $con = ConnectionFactory::getConnection();
            $stmt= $con->prepare("UPDATE clientes SET nome= :nome, email= :email, cpf= :cpf, telefone= :telefone WHERE id= :id");
            $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $stmt->bindParam(':telefone', $telefone, PDO::PARAM_STR);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt;
        }

        public static function delete($id){
            $con= ConnectionFactory::getConnection();

            $stmt = $con->prepare("DELETE FROM clientes WHERE id= :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }
?>