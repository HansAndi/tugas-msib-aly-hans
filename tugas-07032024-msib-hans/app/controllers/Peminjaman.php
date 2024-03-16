<?php
date_default_timezone_set('Asia/Jakarta');

class Peminjaman extends Controller
{
    public function __construct()
    {
        if (!isset($_SESSION['login'])) {
            header('Location: ' . BASE_URL . '/login');
        }
    }

    public function index()
    {
        if ($_SESSION['role'] == 'admin') {
            $data = [
                'title' => 'Peminjaman',
                'peminjaman' => $this->model('Peminjaman_model')->getAllPeminjaman(),
            ];

            $this->view('peminjaman/admin', $data);
        } else {
            $user_id = $_SESSION['id'];

            $data = [
                'title' => 'Peminjaman',
                'peminjaman' => $this->model('Peminjaman_model')->getPeminjamanByUserId($user_id),
            ];

            $this->view('peminjaman/index', $data);
        }
    }

    public function pinjam()
    {
        $user_id = $_SESSION['id'];
        $buku_id = $_POST['buku_id'];

        $data = [
            'user_id' => $user_id,
            'buku_id' => $buku_id,
            'tanggal_pinjam' => date('Y-m-d H:i:s'),
        ];

        if ($this->model('Peminjaman_model')->tambahPeminjaman($data) > 0) {
            Flasher::setFlash('berhasil', 'dipinjam', 'success');
            header('Location: ' . BASE_URL . '/peminjaman');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dipinjam', 'danger');
            header('Location: ' . BASE_URL . '/peminjaman');
            exit;
        }
    }

    public function kembali()
    {
        $data = [
            'id' => $_POST['id'],
            'tanggal_kembali' => date('Y-m-d H:i:s'),
            'status' => false,
        ];

        if ($this->model('Peminjaman_model')->editPeminjaman($data) > 0) {
            Flasher::setFlash('berhasil', 'dikembalikan', 'success');
            header('Location: ' . BASE_URL . '/peminjaman');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dikembalikan', 'danger');
            header('Location: ' . BASE_URL . '/');
            exit;
        }
    }
}
