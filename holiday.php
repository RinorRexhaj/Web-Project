<?php
//include 'userRepo.php';
//$userRepo = new userRepo();

class Holiday {
        private $id;
        private $title;
        private $description;
        private $location;
        private $price;
        private $image;
        private $userId;

        public function __construct($id,$title,$description,$location,$price,$image,$userId) {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->location = $location;
            $this->price = $price;
            $this->image = $image;
            $this->userId = $userId;
        }

        //Getters
        public function getId() {
            return $this->id;
          }
        public function getTitle() {
          return $this->title;
        }
        public function getDescription() {
          return $this->description;
        }
        public function getLocation() {
          return $this->location;
        }
        public function getPrice() {
          return $this->price;
        }
        public function getImage() {
            return $this->image;
        }
        public function getUserId() {
          return $this->userId;
        }

        public function displayHoliday() {
            echo '<div class="holiday">
                    <div class="image-container">
                      <img src="' . $this->img . '" alt="' . $this->title . '">
                        <div class="description">Posted by: '.$this->id .'<br><br>'. $this->description . '</div>
                        </div>
                        <h2>' . $this->title . '</h2>
                        <div class="place__details">
                      <p>Location: ' . $this->location . '</p>
                      <p>Price: ' . $this->price . '$' . '</p>
                    </div>
                  </div>';
        }
    }
?>