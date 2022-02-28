<?php
class Hall {
    protected $id;
    protected $seats;
    protected $floor;
    protected $isens;
    protected $imax;


    public function __construct($_id, $_seats, $_floor, $_isens, $_imax) {
        $this->id = $_id;
        $this->seats = $_seats;
        $this->floor = $_floor;
        $this->isens = $_isens;
        $this->imax = $_imax;
    }

    public function getInfo() {
        return [$this->id, $this->seats, $this->floor, $this->isens, $this->imax];
    }
}
