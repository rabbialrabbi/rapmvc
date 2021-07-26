<?php
class Auth {
    protected $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    public function authCheck($user)
    {
        $email = $user['email'];
        $pass = md5($user['password']);
        $this->db->query('SELECT * FROM user WHERE email = :email AND password = :pass');
        $this->db->bindValue(':email',$email);
        $this->db->bindValue(':pass',$pass);
        $this->db->execute();
        $dataCount = $this->db->rowCount();

        if($dataCount ==1){
            return true;
        }
        return false;
    }
}