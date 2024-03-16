<?php
class Buku_model
{
    private $table = 'buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBuku()
    {
        // $this->db->query('SELECT * FROM ' . $this->table);
        $this->db->query('SELECT 
        buku.id, judul, nama_penulis, nama_penerbit, nama_kategori, tahun, cover, penulis_id, penerbit_id, kategori_id
        FROM buku
        JOIN penulis ON buku.penulis_id = penulis.id
        JOIN penerbit ON buku.penerbit_id = penerbit.id
        JOIN kategori ON buku.kategori_id = kategori.id
        ORDER BY buku.id DESC');
        return $this->db->resultALl();
    }

    public function getBukuById($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }

    public function tambahBuku($data)
    {
        // $cover = $this->upload();
        // if (!$cover) {
        //     return false;
        // }

        if ($_FILES['cover']['error'] !== 4) {
            $cover = $this->upload();
        }

        $query = "INSERT INTO buku (judul, penulis_id, penerbit_id, kategori_id, tahun, cover) VALUES (:judul, :penulis_id, :penerbit_id, :kategori_id, :tahun, :cover)";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('penulis_id', $data['penulis_id']);
        $this->db->bind('penerbit_id', $data['penerbit_id']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('cover', $cover);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function editBuku($data)
    {
        // $cover = $this->upload();
        // if ($cover === false && empty($_FILES['cover']['name'])) {
        //     $cover = $this->getBukuById($data['id']);
        //     $cover = $cover['cover'];
        //     // $cover = $data['cover'];
        // }

        if ($_FILES['cover']['error'] !== 4) {
            $cover = $this->upload();
        } else {
            $cover = $this->getBukuById($data['id']);
            $cover = $cover['cover'];
        }

        $query = "UPDATE buku SET judul = :judul, penulis_id = :penulis_id, penerbit_id = :penerbit_id, kategori_id = :kategori_id, tahun = :tahun, cover = :cover WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('penulis_id', $data['penulis_id']);
        $this->db->bind('penerbit_id', $data['penerbit_id']);
        $this->db->bind('kategori_id', $data['kategori_id']);
        $this->db->bind('tahun', $data['tahun']);
        $this->db->bind('cover', $cover);
        $this->db->bind('id', $data['id']);

        // $data['cover'] = $this->upload();
        // if (empty($_FILES['cover']['name'])) {
        //     $cover = $this->getBukuById($data['id']);
        //     $data['cover'] = $cover['cover'];
        // } else {
        //     $data['cover'] = $this->upload();
        // }

        // $values = '';
        // foreach ($data as $key => $value) {
        //     $values .= $key . ' = :' . $key . ', ';
        // }

        // $values = rtrim($values, ', ');

        // $query = "UPDATE buku SET $values WHERE id = :id";
        // $this->db->query($query);
        // foreach ($data as $key => $value) {
        //     $this->db->bind($key, $value);
        // }

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusBuku($id)
    {
        $query = "DELETE FROM buku WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariBuku()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM buku WHERE judul LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultALl();
    }

    public function upload()
    {
        $namaFile = $_FILES['cover']['name'];
        $ukuranFile = $_FILES['cover']['size'];
        $error = $_FILES['cover']['error'];
        $tmpName = $_FILES['cover']['tmp_name'];

        //cek apakah tidak ada gambar yang diupload
        if ($error === 4) {
            echo "<script>
            alert('pilih gambar terlebih dahulu');
            </script>";
            return false;
        }

        //cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>
            alert('yang anda upload bukan gambar');
            </script>";
            return false;
        }

        //cek jika ukurannya terlalu besar
        if ($ukuranFile > 1000000) {
            echo "<script>
            alert('ukuran gambar terlalu besar');
            </script>";
            return false;
        }

        // $dir = 'C:\laragon\www\php-peminjaman\public\img\\';
        // move_uploaded_file($tmpName, $dir . $namaFile);
        $unique = uniqid();
        $unique .= '.';
        $unique .= $ekstensiGambar;

        move_uploaded_file($tmpName, __DIR__ . '/../../public/img/buku//' . $unique);

        return $unique;
    }
}
