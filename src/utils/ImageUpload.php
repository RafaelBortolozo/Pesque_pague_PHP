<?php

    namespace App\utils;

    class ImageUpload {
        public $pasta_alvo;
        public $nome;        
        public $imagem;
        public $extensoes_habilitadas;

        public $uri; //string após upload

        private $extensao;
        private $status;
        private $errors;

        public function upload() {

            $this->verify();

            if ($this->errors) {
                return $this->errors;
            }

            $arquivo_uri = $this->clean($this->nome);

            return move_uploaded_file($this->imagem["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $arquivo_uri);
        }

        private function clean($string) {
            $sem_espacos = strtolower(str_replace(' ', '-', $string)); // substitui todos os espaços por hífen.
            $string_ok = preg_replace(' /[^A-Za-z0-9\-]/', '', $sem_espacos); // remove caracteres especiais (çáé$#).

            $timestamp = date_timestamp_get(date_create()); // captura em segundos a data atual

            $this->uri = $this->pasta_alvo . $timestamp . '-' .$string_ok . '.' . $this->extensao;

            return $this->uri;
        }

        public function verify() {
            $this->extensao = strtolower(pathinfo($this->imagem["name"], PATHINFO_EXTENSION));
            
            if(in_array($this->extensao,  $this->extensoes_habilitadas) === false){
                $this->errors[]= "Extensão não permitida, escolha entre: " . implode(", ", $this->extensoes_habilitadas);
                return;
            }

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $type = finfo_file($finfo, $this->imagem["tmp_name"]);

            if (isset($type) &&  !in_array($type, array("image/png", "image/jpeg", "image/gif"))) {
                $this->errors[] = "O arquivo enviado não é um arquivo de imagem válido.";
                return;
            } 
        } 
    }

?>