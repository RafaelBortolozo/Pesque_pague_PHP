<?php
    namespace App\utils;

    use App\utils\FlashMessages;

    class VerifyLogin{
        public static function login(){
            if(!isset($_SESSION['email']) || !isset($_SESSION['senha'])){
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
                FlashMessages::setMessage('É necessário fazer Login para acessar essa página', 'error');
                header("location:/login");
                exit(0);
            }
        }
        
        public static function logout(){
            if(isset($_SESSION['email']) || isset($_SESSION['senha'])){
                unset($_SESSION['email']);
                unset($_SESSION['senha']);
            }
        }
    }

?>