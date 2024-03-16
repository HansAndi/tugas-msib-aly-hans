<?php
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"></i>Data Penulis</h3>
                <button type="button" class="btn btn-sm btn-success ml-auto tambahPenulis" data-bs-toggle="modal" data-bs-target="#formModal">
                    Tambah Penulis
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover custom-table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Penulis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data['penulis'] as $penulis) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $penulis['nama_penulis']; ?></td>
                                <td>
                                    <a href="<?= BASE_URL; ?>/penulis/edit/<?= $penulis['id']; ?>" class="btn btn-sm btn-warning editPenulis" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $penulis['id']; ?>">
                                    <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="<?= BASE_URL; ?>/penulis/hapus/<?= $penulis['id']; ?>" class="btn btn-sm
                                    btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>

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
                <h1 class="modal-title fs-5" id="judulModal">Tambah Penulis</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL; ?>/penulis/tambah" method="post">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="nama_penulis">Nama Penulis</label>
                        <input type="text" class="form-control" id="nama_penulis" name="nama_penulis">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah Penulis</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include '../app/views/layouts/footer.php';
?>