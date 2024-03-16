<?php
class Penerbit_model
{
    private $table = 'penerbit';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenerbit()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultALl();
    }

    public function getPenerbitById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }

    public function tambahPenerbit($data)
    {
        $query = "INSERT INTO penerbit (nama_penerbit) VALUES (:nama_penerbit)";
        $this->db->query($query);
        $this->db->bind('nama_penerbit', $data['nama_penerbit']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editPenerbit($data)
    {
        $query = "UPDATE penerbit SET nama_penerbit = :nama_penerbit WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama_penerbit', $data['nama_penerbit']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusPenerbit($id)
    {
        $query = "DELETE FROM penerbit WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPenerbit()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM penerbit WHERE judul LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultALl();
    }
}
