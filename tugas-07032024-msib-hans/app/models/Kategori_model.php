<?php
class Kategori_model
{
    private $table = 'kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultALl();
    }

    public function getKategoriById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }

    public function tambahKategori($data)
    {
        $query = "INSERT INTO kategori (nama_kategori) VALUES (:nama_kategori)";
        $this->db->query($query);
        $this->db->bind('nama_kategori', $data['nama_kategori']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editKategori($data)
    {
        $query = "UPDATE kategori SET judul = :nama_kategori WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama_kategori', $data['nama_kategori']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusKategori($id)
    {
        $query = "DELETE FROM kategori WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariKategori()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM kategori WHERE nama_kategori LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultALl();
    }
}
