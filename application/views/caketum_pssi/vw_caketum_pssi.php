<main>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">
            <?php echo $judul; ?>
        </h1>
        <div class="row">
            <div class="col-md-12"><a href="<?= base_url('index.php/') ?>Caketum_pssi/tambah"
                    class="btn btn-info mb-2">Tambah Calon Ketua Umum PSSI</a>
                <div class="col-md-12">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Nik</td>
                                <td>Asal</td>
                                <td>Umur</td>
                                <td>Pengalaman Sepak Bola Professional</td>
                                <td>Durasi Pengalaman</td>
                                <td>Foto</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($caketum_pssi as $us): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $us['nama']; ?></td>
                                    <td><?= $us['nik']; ?></td>
                                    <td><?= $us['asal']; ?></td>
                                    <td><?= $us['umur']; ?></td>
                                    <td><?= $us['pengalaman']; ?></td>
                                    <td><?= $us['durasi']; ?> Tahun</td>
                                    <td><img src="<?= base_url('assets/assets/img/caketum_pssi/') . $us['foto']; ?>" style="width: 100px;" class="img-thumbnail"></td>
                                    <td>
                                        <a href="<?= base_url('index.php/Caketum_pssi/hapus/') . $us['id']; ?>"
                                            class="btn btn-danger">Hapus</a>
                                        <a href="<?= base_url('index.php/Caketum_pssi/edit/') . $us['id']; ?>"
                                            class="btn btn-warning">Edit</a>
                                        <a href="<?= base_url('index.php/Caketum_pssi/detail/') . $us['id']; ?>"
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