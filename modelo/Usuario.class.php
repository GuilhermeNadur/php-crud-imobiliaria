<?php

    class Usuario {

        private $id;
        private $login;
        private $password;
        private $perfil;

        public function __construct() {}
        
        public function getPerfil()
        {
            return $this->perfil;
        }

        public function setPerfil($perfil)
        {
            $this->perfil = $perfil;

            return $this;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;

            return $this;
        }
    
        public function getLogin()
        {
            return $this->login;
        }

        public function setLogin($login)
        {
            $this->login = $login;

            return $this;
        }
    
        public function getId()
        {
            return $this->id;
        }
    
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }
    }
?>
