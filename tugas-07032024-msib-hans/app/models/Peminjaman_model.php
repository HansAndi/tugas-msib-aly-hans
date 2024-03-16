<?php
class Peminjaman_model
{
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query('SELECT * FROM peminjaman
        JOIN users ON peminjaman.user_id = users.id
        JOIN buku ON peminjaman.buku_id = buku.id
        ORDER BY peminjaman.id DESC');

        return $this->db->resultALl();
    }

    public function getPeminjamanById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }

    public function getPeminjamanByUserId($id)
    {
        // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE user_id=:user_id');
        $this->db->query('SELECT 
        peminjaman.id, judul, tanggal_pinjam, tanggal_kembali, status_peminjaman
        FROM peminjaman
        JOIN users ON peminjaman.user_id = users.id
        JOIN buku ON peminjaman.buku_id = buku.id
        WHERE user_id=:user_id
        ORDER BY tanggal_pinjam DESC');
        $this->db->bind('user_id', $id);
        return $this->db->resultALl();
    }

    public function tambahPeminjaman($data)
    {
        $query = "INSERT INTO peminjaman (user_id, buku_id, tanggal_pinjam) VALUES (:user_id, :buku_id, :tanggal_pinjam)";
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('buku_id', $data['buku_id']);
        $this->db->bind('tanggal_pinjam', $data['tanggal_pinjam']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editPeminjaman($data)
    {
        $query = "UPDATE peminjaman SET tanggal_kembali = :tanggal_kembali, status_peminjaman = :status WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('tanggal_kembali', $data['tanggal_kembali']);
        $this->db->bind('status', $data['status']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusPeminjaman($id)
    {
        $query = "DELETE FROM peminjaman WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariPeminjaman()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM peminjaman WHERE nama_peminjaman LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultALl();
    }
}
