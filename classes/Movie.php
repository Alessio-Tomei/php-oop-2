<?php
class Movie {
    private $title;
    private $genre;
    private $duration;
    private $rating;
    private $language;
    private $actors;


    public function __construct($_title, $_genre, $_duration, $_language, $_actors = []) {
        $this->title = $_title;
        $this->genre = $_genre;
        $this->duration = $_duration;
        $this->language = $_language;
        $this->actors = $_actors;
    }


    public function setRating($_rating) {
        if (is_numeric($_rating) && $_rating >= 0 && $_rating <= 10) {
            $this->rating = round($_rating);
        }
    }

    public function addActors($_actors) {
        $this->actors[] = $_actor;
    }

    public function getInfo() {
        return [$this->title, $this->genre, $this->duration, $this->rating, $this->language, $this->actors];
    }
}


