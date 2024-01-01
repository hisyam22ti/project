<main>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">
            <?php echo $judul; ?>
        </h1>
        <div class="row">
            <div class="col-md-12">
                <?= $this->session->flashdata('message'); ?>
                <div class="row text-center">
                    <?php foreach ($kantin as $us) : ?>
                        <div class="card ms-3 mb-3" style="width: 16rem;">
                            <img class="mx-auto mt-3" src="<?= base_url('assets/assets/img/profile/') . $us['gambar']; ?>" class="card-img-top" alt="..." style="width: 200px; height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title mb-1"><?= $us['nama']; ?></h5>
                                <a href="<?= base_url('index.php/Customer/pilih/') . ($us['id']) ?>" class="btn btn-primary">Pilih</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- <main>
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
                                <td><img src="<?= base_url('assets/assets/img/profile/') . $us['gambar']; ?>" style="width: 100px;" class="img-thumbnail"></td>
                                <td><div class="col-md-12"><a href="<?= base_url('index.php/Customer/pilih/') . ($us['id']) ?>" class="btn btn-info mb-2"><?= $us['nama']; ?></a>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main> -->