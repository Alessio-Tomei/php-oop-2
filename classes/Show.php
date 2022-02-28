<?php
class Show {
    private $id;
    private $idHall;
    private $time;
    private $date;
    private $booking;


    public function __construct($_id, $_idHall, $_time, $_date, $_booking) {
        $this->id = $_id;
        $this->idHall = $_idHall;
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
        return [$this->id, $this->idHall, $this->time, $this->date, $this->booking];
    }
}