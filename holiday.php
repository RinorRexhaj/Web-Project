<?php

  class Holiday {
        private $id;
        private $title;
        private $description;
        private $location;
        private $price;
        private $image;
        private $userId;
        private $editedBy;

        public function __construct($id,$title,$description,$location,$price,$image,$userId, $editedBy) {
            $this->id = $id;
            $this->title = $title;
            $this->description = $description;
            $this->location = $location;
            $this->price = $price;
            $this->image = $image;
            $this->userId = $userId;
            $this->editedBy = $editedBy;
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
        public function getEditedBy() {
          return $this->editedBy;
        }
    }
?>