<?php
class Post {
    public $id;
    public $title;
    public $content;
    public $author;
    public $date;
    public $user_id;

    public function __construct($id, $title, $author, $content, $date, $user_id) {
        $this->id = $id;
        $this->author = $author;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
        $this->user_id = $user_id;
    }
}

?>