<?php
require_once __DIR__.'/Hall.php';

class SpecialHall extends Hall {
    private $smoke;
    private $vibration;
    private $water;


    public function __construct($_id, $_seats, $_floor, $_isens, $_imax, $_smoke, $_vibration, $_water) {
        parent::__construct($_id, $_seats, $_floor, $_isens, $_imax);
        $this->smoke = $_smoke;
        $this->vibration = $_vibration;
        $this->water = $_water;
    }

    public function getInfo() {
        return array_merge(parent::getInfo(), [$this->smoke, $this->vibration, $this->water]);
    }
}
