<?php

    class User {
        private $id;
        private $username;
        private $fullname;
        private $email;
        private $password;
        private $admin;

        public function __construct($id, $username, $fullname, $email, $password, $admin) {
            $this->id = $id;
            $this->username = $username;
            $this->fullname = $fullname;
            $this->email = $email;
            $this->password = $password;
            $this->admin = $admin;
        }

        public function getId() {
            return $this->id;
        }
        public function getUsername() {
            return $this->username;
        }
        public function getFullname() {
            return $this->fullname;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPassword() {
            return $this->password;
        }
        public function getAdmin() {
            return $this->admin;
        }
        
    }

?>