<?php
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
?>

<div class="row">
    <?php Flasher::flash(); ?>
</div>

<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"></i>Data Buku</h3>
                <?php if ($_SESSION['role'] == 'admin') : ?>
                    <button type="button" class="btn btn-sm btn-success ml-auto tambahBuku" data-bs-toggle="modal" data-bs-target="#formModal">
                        Tambah Buku
                    </button>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover custom-table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Cover</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['buku'] as $buku) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $buku['judul']; ?></td>
                                <td><?= $buku['nama_penulis']; ?></td>
                                <td>
                                    <img src="<?= BASE_URL; ?>/img/buku/<?= $buku['cover']; ?>" style="max-width: 50px;">
                                </td>
                                <td>
                                    <?php if ($_SESSION['role'] == 'user') : ?>
                                        <form action="<?= BASE_URL; ?>/peminjaman/pinjam" method="post" class="">
                                            <input type="hidden" name="buku_id" value="<?= $buku['id']; ?>">
                                            <button type class="btn btn-sm btn-primary">Pinjam</button>
                                            <a href="<?= BASE_URL; ?>/buku/detail/<?= $buku['id']; ?>" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#detailModal">Detail</a>
                                            <?php if ($_SESSION['role'] == 'admin') : ?>
                                                <a href="<?= BASE_URL; ?>/buku/edit/<?= $buku['id']; ?>" class="btn btn-sm btn-warning editBuku" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $buku['id']; ?>">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <a href="<?= BASE_URL; ?>/buku/hapus/<?= $buku['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i></a>
                                            <?php endif; ?>
                                        </form>
                                    <?php endif ?>

                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>/buku/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>

                    <!-- loop select penulis, pengarang and kategori -->
                    <div class="form-group">
                        <label for="penulis_id">Pengarang</label>
                        <select class="form-select" id="penulis_id" name="penulis_id">
                            <option disabled selected>Pilih Pengarang</option>
                            <?php foreach ($data['penulis'] as $penulis) : ?>
                                <option value="<?= $penulis['id']; ?>"><?= $penulis['nama_penulis']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="penerbit_id">Penerbit</label>
                        <select class="form-select" id="penerbit_id" name="penerbit_id">
                            <option disabled selected>Pilih Penerbit</option>
                            <?php foreach ($data['penerbit'] as $penerbit) : ?>
                                <option value="<?= $penerbit['id']; ?>"><?= $penerbit['nama_penerbit']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori_id">Kategori</label>
                        <select class="form-select" id="kategori_id" name="kategori_id">
                            <option disabled selected>Pilih Kategori</option>
                            <?php foreach ($data['kategori'] as $kategori) : ?>
                                <option value="<?= $kategori['id']; ?>"><?= $kategori['nama_kategori']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tahun">Tahun Terbit</label>
                        <input type="number" class="form-control" id="tahun" name="tahun">
                    </div>

                    <div class="form-group">
                        <label for="cover">Cover</label>
                        <input type="file" class="form-control" id="cover" name="cover">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Buku</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Buku</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="width: 18rem;">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include '../app/views/layouts/footer.php';
?>