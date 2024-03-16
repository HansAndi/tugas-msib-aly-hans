<?php

class Penulis_model
{
    private $table = 'penulis';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenulis()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultAll();
    }

    public function getPenulisById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }

    public function tambahPenulis($data)
    {
        $query = "INSERT INTO penulis (nama_penulis) VALUES (:nama_penulis)";
        $this->db->query($query);
        $this->db->bind('nama_penulis', $data['nama_penulis']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editPenulis($data)
    {
        $query = "UPDATE penulis SET nama_penulis = :nama_penulis WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama_penulis', $data['nama_penulis']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusPenulis($id)
    {
        $query = "DELETE FROM penulis WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPenulis()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM penulis WHERE nama_penulis LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultAll();
    }
}
