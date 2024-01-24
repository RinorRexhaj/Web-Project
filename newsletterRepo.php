<?php

    include_once 'dbConnection.php';

    class NewsletterRepo {
        private $connection;

        function __construct() {
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        function insertNewsletter($email) {
            $conn = $this->connection;

            $sql = 'INSERT INTO Newsletter (Email) VALUES (?)';

            $statement = $conn->prepare($sql);

            $statement->execute([$email]);
        }

        function getNewsletters() {
            $conn = $this->connection;

            $sql = 'SELECT * FROM Newsletter';

            $statement = $conn->query( $sql );
            $newsletters = $statement->fetchAll();

            return $newsletters;
        }

        function getNewsletterById($email) {
            $conn = $this->connection;

            $sql = "SELECT * FROM Newsletter WHERE Email='$email'";

            $statement = $conn->query( $sql );
            $newsletter = $statement->fetch();

            return $newsletter;
        }

        function deleteNewsletter($email) {
            $conn = $this->connection;

            $sql = 'DELETE FROM Newsletter WHERE Email=?';

            $statement = $conn->prepare($sql);

            $statement->execute([$email]);
        }
    }

?>