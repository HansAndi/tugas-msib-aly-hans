<?php
include '../app/views/layouts/header.php';
include '../app/views/layouts/sidebar.php';
include '../app/views/functions/dateFormat.php';
?>

<div class="row d-flex justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title"></i>Data Peminjaman</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover custom-table text-center">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($data['peminjaman'] as $peminjaman) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $peminjaman['judul']; ?></td>
                                <td><?= dateFormat($peminjaman['tanggal_pinjam']); ?></td>
                                <td>
                                    <?php if ($peminjaman['tanggal_kembali'] == null) {
                                        echo '-';
                                    } else {
                                        echo dateFormat($peminjaman['tanggal_kembali']);
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($peminjaman['status_peminjaman'] == 1) {
                                        echo '<span class="badge bg-danger">On Loan</span>';
                                    } else {
                                        echo '<span class="badge bg-success">Returned</span>';
                                    } ?>
                                </td>
                                <td>
                                    <?php if ($peminjaman['status_peminjaman'] == 1) : ?>
                                        <form action="<?= BASE_URL; ?>/peminjaman/kembali/<?= $peminjaman['id']; ?>" method="post">
                                            <input type="hidden" name="id" value="<?= $peminjaman['id']; ?>">
                                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Yakin ingin mengembalikan buku ini?')">Kembali</button>
                                        </form>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
include '../app/views/layouts/footer.php';
?>