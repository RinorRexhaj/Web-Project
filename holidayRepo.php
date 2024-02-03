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
            $image = $holiday->getImage();
            $userId = $holiday->getUserId();

            $sql = "INSERT INTO holidays (id,title,description,location,price,image,user_id, editedby) VALUES (?,?,?,?,?,?,?,?)";

            $statement = $conn->prepare($sql);

            $statement->execute([$id,$title,$description,$location,$price,$image,$userId, $editedBy]);

        }

        function getHolidays(){
            $conn = $this->connection;

            $sql = "SELECT * FROM holidays
            order by id desc";

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

        function updateHoliday($id,$title,$description,$location,$price,$image,$editedBy){
            $conn = $this->connection;

            $sql = "UPDATE holidays SET title=?, description=?, location=?, price=?, image=?, editedby=? WHERE id=?";

            $statement = $conn->prepare($sql);

            $statement->execute([$title,$description,$location,$price,$image,$editedBy,$id]);

        }

        function deleteHoliday($id){
            $conn = $this->connection;

            $sql = "DELETE FROM Holidays WHERE id=?";

            $statement = $conn->prepare($sql);

            $statement->execute([$id]);
        }
        
        function getYourHolidays($id) {
            $conn = $this->connection;

            $sql = "SELECT * FROM Holidays WHERE User_ID='$id'";

            $statement = $conn->query($sql);
            $holidays = $statement->fetchAll();

            return $holidays;
        }  

        function getRandomHolidays() {
            $conn = $this->connection;

            $sql = "SELECT * FROM Holidays  
            ORDER BY RAND ( )  
            LIMIT 3";

            $statement = $conn->query($sql);
            $randomH = $statement->fetchAll();

            return $randomH;
        }
    }

?>
