<?php

class Post{
    public $db ;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $this->db->query('SELECT * FROM post WHERE tag = :tag');
        $this->db->bindValue(':tag','IT');
        $this->db->execute();
        return $this->db->getResult();
    }
}