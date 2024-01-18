<?php
include_once './dbConnection.php';

class UserRepo {
    private $connection;

    function __construct() {
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertUser( $user ) {
        $conn = $this->connection;

        $id = $user->getId();
        $username = $user->getUsername();
        $fullname = $user->getFullname();
        $email = $user->getEmail();
        $password = $user->getPassword();
        $admin = $user->getAdmin();

        $sql = 'INSERT INTO Users (ID,Username,FullName,Email,Password,Admin) VALUES (?,?,?,?,?,?)';

        $statement = $conn->prepare( $sql );

        $statement->execute( [ $id, $username, $fullname, $email, $password, $admin ] );
    }

    function getUsers() {
        $conn = $this->connection;

        $sql = 'SELECT * FROM users';

        $statement = $conn->query( $sql );
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById( $id ) {
        $conn = $this->connection;

        $sql = "SELECT * FROM Users WHERE ID='$id'";

        $statement = $conn->query( $sql );
        $user = $statement->fetch();

        return $user;
    }

    function updateUser( $id, $username, $fullname, $email, $password, $admin ) {
        $conn = $this->connection;

        $sql = 'UPDATE Users SET Username=?, FullName=?, Email=?, Password=?, Admin=? WHERE ID=?';

        $statement = $conn->prepare( $sql );

        $statement->execute( [ $username, $fullname, $email, $password, $admin, $id ] );
    }

    function deleteUser( $id ) {
        $conn = $this->connection;

        $sql = 'DELETE FROM Users WHERE id=?';

        $statement = $conn->prepare( $sql );

        $statement->execute( [ $id ] );
    }
}
?>