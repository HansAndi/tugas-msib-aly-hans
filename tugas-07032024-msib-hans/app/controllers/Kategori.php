<?php
class Kategori extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'kategori' => $this->model('Kategori_model')->getAllKategori()
        ];

        $this->view('kategori/index', $data);
    }

    public function tambah()
    {
        if ($this->model('Kategori_model')->tambahKategori($_POST) > 0) {
            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/kategori');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/kategori');
            exit;
        }
    }

    public function getEdit($id)
    {
        echo json_encode($this->model('Kategori_model')->getKategoriById($id));
    }

    public function edit()
    {
        if ($this->model('Kategori_model')->editKategori($_POST) > 0) {
            Flasher::setFlash('berhasil', 'diubah', 'success');
            header('Location: ' . BASE_URL . '/kategori');
            exit;
        } else {
            Flasher::setFlash('gagal', 'diubah', 'danger');
            header('Location: ' . BASE_URL . '/kategori');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Kategori_model')->hapusKategori($id) > 0) {
            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASE_URL . '/kategori');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASE_URL . '/kategori');
            exit;
        }
    }
}
