<?php
class Mahasiswa {
    private $nim, $nama, $prodi, $jurusan, $kampus;

    public function __construct($nim, $nama, $prodi, $jurusan, $kampus) {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->prodi = $prodi;
        $this->jurusan = $jurusan;
        $this->kampus = $kampus;
    }

    public function getNim() {
        return $this->nim;
    }

    public function setNim($nim) {
        $this->nim = $nim;
    }

    public function getNama() {
        return $this->nama;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function getProdi() {
        return $this->prodi;
    }

    public function setProdi($prodi) {
        $this->prodi = $prodi;
    }

    public function getJurusan() {
        return $this->jurusan;
    }

    public function setJurusan($jurusan) {
        $this->jurusan = $jurusan;
    }

    public function getKampus() {
        return $this->kampus;
    }

    public function setKampus($kampus) {
        $this->kampus = $kampus;
    }

    public function __toString(){
        return "NIM : " . $this->nim . "<br>" . "Nama : " . $this->nama . "<br>" . "Prodi : " . $this->prodi . "<br>" . "Jurusan : " . $this->jurusan . "<br>" . "Kampus : " . $this->kampus;
    }
}

$mahasiswa = new Mahasiswa("2141", "Hans", "Teknik Informatika", "Teknologi Informasi", "Polinema");
echo $mahasiswa;