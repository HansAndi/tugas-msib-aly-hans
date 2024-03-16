<?php
class Penerbit extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Penerbit',
            'penerbit' => $this->model('Penerbit_model')->getAllPenerbit()
        ];
        
        $this->view('penerbit/index', $data);
    }

    public function getAllPenerbit()
    {
        $data = $this->model('Penerbit_model')->getAllPenerbit();
        echo json_encode($data);
    }

    public function tambah()
    {
        if ($this->model('Penerbit_model')->tambahPenerbit($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/penerbit');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/penerbit');
            exit;
        }
    }

    public function getEdit()
    {
        echo json_encode($this->model('Penerbit_model')->getPenerbitById($_POST['id']));
    }

    public function edit()
    {
        if ($this->model('Penerbit_model')->editPenerbit($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . '/penerbit');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASE_URL . '/penerbit');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Penerbit_model')->hapusPenerbit($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/penerbit');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/penerbit');
            exit;
        }
    }
}
