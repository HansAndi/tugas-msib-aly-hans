<?php
class Buku extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Buku',
            'buku' => $this->model('Buku_model')->getAllBuku(),
            'penulis' => $this->model('Penulis_model')->getAllPenulis(),
            'penerbit' => $this->model('Penerbit_model')->getAllPenerbit(),
            'kategori' => $this->model('Kategori_model')->getAllKategori()
        ];

        $this->view('buku/index', $data);
    }

    public function detail($id)
    {
        $data['judul'] = "Detail Buku";
        $data['buku'] = $this->model("Buku_model")->getBukuById($id);
        $this->view('templates/header', $data);
        $this->view('buku/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        if ($this->model('Buku_model')->tambahBuku($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/buku');
            exit;
        }
    }

    public function getEdit()
    {
        echo json_encode($this->model('Buku_model')->getBukuById($_POST['id']));
    }

    public function edit()
    {
        if ($this->model('Buku_model')->editBuku($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diupdate', 'success');
            header('Location: ' . BASE_URL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diupdate', 'danger');
            header('Location: ' . BASE_URL . '/buku');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Buku_model')->hapusBuku($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/buku');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/buku');
            exit;
        }
    }

    public function cari()
    {
        $data['judul'] = "Buku";
        $data['buku'] = $this->model("Buku_model")->cariBuku();
        $this->view('templates/header', $data);
        $this->view('buku/index', $data);
    }
}
