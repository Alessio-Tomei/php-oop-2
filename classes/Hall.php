<?php
class Hall {
    protected $name;
    protected $seats;
    protected $floor;
    protected $isens;
    protected $imax;


    public function __construct($_name, $_seats, $_floor, $_isens, $_imax) {
        $this->name = $_name;
        $this->seats = $_seats;
        $this->floor = $_floor;
        $this->isens = $_isens;
        $this->imax = $_imax;
    }

    public function getInfo() {
        return [$this->name, $this->seats, $this->floor, $this->isens, $this->imax];
    }
}
