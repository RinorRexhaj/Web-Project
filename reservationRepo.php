<?php 
    include_once 'dbConnection.php';

    class ReservationRepo{
        private $connection;

        function __construct(){
            $conn = new DatabaseConnection;
            $this->connection = $conn->startConnection();
        }

        function insertReservation($reservation){
            $conn = $this->connection;

            $id = $reservation->getId();
            $destination = $reservation->getDestination();
            $from = $reservation->getFrom();
            $checkIn = $reservation->getCheckIn();
            $checkOut = $reservation->getCheckOut();
            $userID = $reservation->getUserID();

            $sql = "INSERT INTO Reservations (ID, Destination, FromRs, CheckIn, CheckOut, UserID) VALUES (?,?,?,?,?,?)";

            $statement = $conn->prepare($sql);

            $statement->execute([$id, $destination, $from, $checkIn, $checkOut, $userID]);

        }

        function getReservations(){
            $conn = $this->connection;

            $sql = "SELECT * FROM Reservations";

            $statement = $conn->query($sql);
            $reservations = $statement->fetchAll();

            return $reservations;
        }

        function getReservationById($id){
            $conn = $this->connection;

            $sql = "SELECT * FROM reservations WHERE id='$id'";

            $statement = $conn->query($sql);
            $reservations = $statement->fetch();

            return $reservations;
        }

        function updateReservation($id, $destination, $from, $checkIn, $checkOut, $userID){
            $conn = $this->connection;

            $sql = "UPDATE reservations SET destination=?, fromrs=?, checkIn=?, checkOut=? WHERE id=?";

            $statement = $conn->prepare($sql);

            $statement->execute([$destination, $from, $checkIn, $checkOut, $id]);

        }

        function deleteReservation($id){
            $conn = $this->connection;

            $sql = "DELETE FROM Reservations WHERE ID=?";

            $statement = $conn->prepare($sql);

            $statement->execute([$id]);
        }

        function getLatestReservation($id) {
            $conn = $this->connection;

            $sql = "SELECT * FROM reservations WHERE userid='$id' ORDER BY id DESC LIMIT 0,1";

            $statement = $conn->query($sql);
            $reservations = $statement->fetch();

            return $reservations;
        }
    }

?>
