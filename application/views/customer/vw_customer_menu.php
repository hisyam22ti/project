<main>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">
            <?php echo $judul; ?>
        </h1>
        <div class="row">
            <div class="col-md-12"><a href="<?= base_url('index.php/') ?>User" class="btn btn-info mb-2">Kembali</a>
                <div class="col-md-12">
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Menu</td>
                                <td>Gambar</td>
                                <td>Harga</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($menu as $us): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $us['nama']; ?></td>
                                    <td><img src="<?= base_url('assets/assets/img/menu/') . $us['gambar']; ?>" style="width: 100px;" class="img-thumbnail"></td>
                                    <td><?= $us['harga']; ?></td>
                                    <td>
                                        <a href="<?= base_url('index.php/Pesanan/tambah/') . $us['id']; ?>"class="btn btn-danger">Pilih</a>
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