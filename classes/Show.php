<?php
class Show {
    private $movie;
    private $hall;
    private $time;
    private $date;
    private $booking;

    public function __construct($_movie, $_hall, $_time, $_date, $_booking) {
        $this->movie = $_movie;
        $this->hall = $_hall;
        $this->time = $_time;
        $this->date = $_date;
        $this->booking = $this->initializeReservations($_booking);
    }


    private function initializeReservations($_seatsNumber) {
        $tempArray = [];
        for ($i=0; $i < $_seatsNumber; $i++) { 
            $tempArray[] = false;
        }
        return $tempArray;
    }

    public function setReservation($_seatNumber) {
        $this->booking[$_seatNumber] = true;
    }

    public function getInfo() {
        return [$this->movie, $this->hall, $this->time, $this->date, $this->booking];
    }
}