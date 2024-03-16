<?php
class Penulis extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Penulis',
            'penulis' => $this->model('Penulis_model')->getAllPenulis()
        ];

        $this->view('penulis/index', $data);
    }

    public function tambah()
    {
        if ($this->model('Penulis_model')->tambahPenulis($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/penulis');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/penulis');
            exit;
        }
    }

    public function getEdit()
    {
        echo json_encode($this->model('Penulis_model')->getPenulisById($_POST['id']));
    }

    public function edit()
    {
        if ($this->model('Penulis_model')->editPenulis($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diupdate', 'success');
            header('Location: ' . BASE_URL . '/penulis');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diupdate', 'danger');
            header('Location: ' . BASE_URL . '/penulis');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Penulis_model')->hapusPenulis($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/penulis');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/penulis');
            exit;
        }
    }
}
