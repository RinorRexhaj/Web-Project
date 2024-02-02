<?php

    class User {
        private $id;
        private $username;
        private $fullname;
        private $email;
        private $password;
        private $profile;
        private $admin;

        public function __construct($id, $username, $fullname, $email, $password, $profile,$admin) {
            $this->id = $id;
            $this->username = $username;
            $this->fullname = $fullname;
            $this->email = $email;
            $this->password = $password;
            $this->profile = $profile;
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
        public function getProfile() {
            return $this->profile;
        }
        public function getAdmin() {
            return $this->admin;
        }
        
    }

?>