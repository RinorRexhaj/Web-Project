<?php

    class Reservation {
        private $id;
        private $destination;
        private $from;
        private $checkIn;
        private $checkOut;
        private $userID;

        public function __construct($id, $destination, $from, $checkIn, $checkOut, $userID) {
            $this->id = $id;
            $this->destination = $destination;
            $this->from = $from;
            $this->checkIn = $checkIn;
            $this->checkOut = $checkOut;
            $this->userID = $userID;
        }

        public function getId() {
            return $this->id;
        }
        public function getDestination() {
            return $this->destination;
        }
        public function getFrom() {
            return $this->from;
        }
        public function getCheckIn() {
            return $this->checkIn;
        }
        public function getCheckOut() {
            return $this->checkOut;
        }
        public function getUserID() {
            return $this->userID;
        }

        public function toString() {
            return $this->destination.' -> '.$this->from;
        }
        
    }

?>