<?php

class CFilm extends CContent {

    function __construct($db) {
        parent::__construct($db);
    }

    function GetPost() {
        $slug = isset($_GET['slug']) ? $_GET['slug'] : null;
        $res = $this->SelectPost($slug);
        return $res;
    }
    
    function GetFilmPublish() {
        $slug = isset($_GET['slug']) ? $_GET['slug'] : null;
        $res = $this->SelectFilmPublished($slug);
        return $res;
    }
} 
