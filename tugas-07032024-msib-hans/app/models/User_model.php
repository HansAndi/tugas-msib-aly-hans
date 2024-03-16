<?php
class User_model
{
    private $nama = 'Hans Andi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getUser()
    {
        return $this->nama;
    }

    public function getByUsername($username)
    {
        $this->db->query('SELECT * FROM users WHERE username=:username');
        $this->db->bind('username', $username);
        return $this->db->resultSingle();
    }

    public function register($username, $password, $role)
    {
        $query = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $this->db->query($query);
        $this->db->bind('username', $username);
        $this->db->bind('password', $password);
        $this->db->bind('role', $role);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
