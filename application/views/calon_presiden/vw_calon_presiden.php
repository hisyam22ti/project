<main>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">
            <?php echo $judul; ?>
        </h1>
        <div class="row">
            <div class="col-md-12"><a href="<?= base_url('index.php/') ?>Calon_presiden/tambah"
                    class="btn btn-info mb-2">Tambah Calon Presiden</a>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Lengkap</td>
                                <td>Nik</td>
                                <td>Partai Pendukung</td>
                                <td>Asal</td>
                                <td>Umur</td>
                                <td>Riwayat Pekerjaan</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($calon_presiden as $us): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $us['nama_lengkap']; ?></td>
                                    <td><?= $us['nik']; ?></td>
                                    <td><?= $us['partai_pendukung']; ?></td>
                                    <td><?= $us['asal']; ?></td>
                                    <td><?= $us['umur']; ?></td>
                                    <td><?= $us['riwayat_pekerjaan']; ?></td>
                                    <td>
                                        <a href="<?= base_url('index.php/Calon_presiden/hapus/') . $us['id']; ?>"
                                            class="btn btn-danger">Hapus</a>
                                        <a href="<?= base_url('index.php/Calon_presiden/edit/') . $us['id']; ?>"
                                            class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('index.php/Calon_presiden/detail/') . $us['id']; ?>"
                                            class="btn btn-info">Detail</a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>