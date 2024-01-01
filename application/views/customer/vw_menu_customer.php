<main>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">
        <?php echo $kantin['nama']; ?>
        </h1>
        <div class="row">
            <div class="col-md-12"><a href="<?= base_url('index.php/Customer') ?>" class="btn btn-secondary mb-3">Kembali</a>
                <div class="col-md-12">
                    <h4><?php echo $judul; ?></h4>
                    <a href="<?= base_url('index.php/Customer/pilih/') . ($kantin['id']) ?>" class="btn btn-info mb-3"><i class="fa-solid fa-burger"></i><i class="fa-solid fa-martini-glass"></i></a>
                    <a href="<?= base_url('index.php/Customer/makan/') . ($kantin['id']) ?>" class="btn btn-info mb-3"><i class="fa-solid fa-burger"></i></a>
                    <a href="<?= base_url('index.php/Customer/minum/') . ($kantin['id']) ?>" class="btn btn-info mb-3"><i class="fa-solid fa-martini-glass"></i></a>
                    <div class="row text-center">
                        <?php foreach ($menu as $us) : ?>
                            <div class="card ms-3 mb-3" style="width: 16rem;">
                                <img class="mx-auto mt-3" src="<?= base_url('assets/assets/img/menu/') . $us['gambar']; ?>" class="card-img-top" alt="..." style="width: 200px; height: 200px; border-radius: 5%;">
                                <div class="card-body">
                                    <h5 class="card-title mb-1"><?= $us['nama']; ?></h5>
                                    <span class="badge text-bg-success mb-3">Rp. <?= $us['harga']; ?></span><br>
                                    <a href="<?= base_url('index.php/Pesanan/tambah/') . $us['id']; ?>" class="btn btn-primary">Pilih</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- <table class="table">
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
                            <?php foreach ($menu as $us) : ?>
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
                    </table> -->