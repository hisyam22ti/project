<main>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">
            <?php echo $judul; ?>
        </h1>
        <div class="row">
            <div class="col-md-12">
                <?= $this->session->flashdata('message'); ?>
                <table class="table">
                    <thead>
                        <tr>
                            <td>Kantin</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($kantin as $us) : ?>
                            <tr>
                                <td><img src="<?= base_url('assets/assets/img/prodi/') . $us['gambar']; ?>" style="width: 100px;" class="img-thumbnail"></td>
                                <td><div class="col-md-12"><a href="<?= base_url('index.php/Customer/pilih/') . ($us['id'])?>" class="btn btn-info mb-2"><?= $us['nama']; ?></a>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>