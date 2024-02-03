<?php

    class Contact {
        private $id;
        private $message;
        private $user;

        public function __construct($id, $message, $user) {
            $this->id = $id;
            $this->message = $message;
            $this->user = $user;
        }

        public function getId() {
            return $this->id;
        }
        public function getMessage() {
            return $this->message;
        }
        public function getUser() {
            return $this->user;
        }
    }

    include_once 'dbConnection.php';

    class ContactRepo{
        private $connection;

        function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        function insertContact($contact){
            $conn = $this->connection;

            $id = $contact->getId();
            $message = $contact->getMessage();
            $user = $contact->getUser();

            $sql = "INSERT INTO contacts (ID, Message, User) VALUES (?,?,?)";

            $statement = $conn->prepare($sql);

            $statement->execute([$id, $message, $user]);

        }

        function getContacts(){
            $conn = $this->connection;

            $sql = "SELECT * FROM Contacts";

            $statement = $conn->query($sql);
            $contacts = $statement->fetchAll();

            return $contacts;
        }

        function getContactById($id){
            $conn = $this->connection;

            $sql = "SELECT * FROM contacts WHERE id='$id'";

            $statement = $conn->query($sql);
            $contacts = $statement->fetch();

            return $contacts;
        }

        function deleteContact($id){
            $conn = $this->connection;

            $sql = "DELETE FROM Contacts WHERE ID=?";

            $statement = $conn->prepare($sql);

            $statement->execute([$id]);
        }
    }

?>