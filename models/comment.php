<?php

    class Comment {
        public $id;
        public $author;
        public $comment;
        public $image;
        // private $date;

        public function __construct($id, $author, $comment, $image) {
            $this->id = $id;
            $this->author = $author;
            $this->comment = $comment;
            $this->image = $image;
        }
    }

?>