<?php 
include_once 'dbConnection.php';

class HolidayRepo{
    private $connection;

    function __construct(){
        $conn = new DatabaseConnection;
        $this->connection = $conn->startConnection();
    }

    function insertHoliday($holiday){
        $conn = $this->connection;

        $id = $holiday->getId();
        $title = $holiday->getTitle();
        $description = $holiday->getDescription();
        $location = $holiday->getLocation();
        $price = $holiday->getPrice();
        $image = $holiday->getIMage();
        $userId = $holiday->getUserId();

        $sql = "INSERT INTO holidays (id,title,description,location,price,image,userId) VALUES (?,?,?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$id,$title,$description,$location,$price,$image,$userId]);

    }

    function getHolidays(){
        $conn = $this->connection;

        $sql = "SELECT * FROM holidays";

        $statement = $conn->query($sql);
        $holidays = $statement->fetchAll();

        return $holidays;
    }

    function getHolidayById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM holidays WHERE id='$id'";

        $statement = $conn->query($sql);
        $holidays = $statement->fetch();

        return $holidays;
    }

    function updateHoliday($id,$title,$description,$location,$price,$image){
         $conn = $this->connection;

         $sql = "UPDATE holidays SET title=?, description=?, location=?, price=?, image=? WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$title,$description,$location,$price,$image,$id]);

    }

    function deleteHoliday($id){
        $conn = $this->connection;

        $sql = "DELETE FROM user WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);
    }
}
?>
