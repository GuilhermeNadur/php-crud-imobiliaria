<?php

    class Imovel {

        private $id;
        private $nome;
        private $endereco;
        private $categoria;
        private $qtde_quartos;
        private $preco;

        public function __construct() {}

        public function getId()
        {
            return $this->id;
        }
    
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }
        
        public function getNome()
        {
            return $this->nome;
        }
    
        public function setNome($nome)
        {
            $this->nome = $nome;

            return $this;
        }
    
        public function getEndereco()
        {
            return $this->endereco;
        }

        public function setEndereco($endereco)
        {
            $this->endereco = $endereco;

            return $this;
        }

        public function getCategoria()
        {
            return $this->categoria;
        }
    
        public function setCategoria($categoria)
        {
            $this->categoria = $categoria;

            return $this;
        }

        public function getQtde_quartos()
        {
            return $this->qtde_quartos;
        }
    
        public function setQtde_quartos($qtde_quartos)
        {
            $this->qtde_quartos = $qtde_quartos;

            return $this;
        }
    
        public function getPreco()
        {
            return $this->preco;
        }
    
        public function setPreco($preco)
        {
            $this->preco = $preco;

            return $this;
        }
    }
?>
