<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <?php echo $judul; ?>
    </h1>
    <div class="row justify-content-center">
        <div class="col md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                <?php echo $menu['nama']; ?>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" value="<?= set_value('deskripsi'); ?>" class="form-control" id="deskripsi" placeholder="Deskripsi">
                            <?= form_error('deskripsi', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="porsi">Porsi</label>
                            <input type="number" name="porsi" value="<?= set_value('porsi'); ?>" class="form-control" id="porsi" placeholder="Porsi">
                            <?= form_error('porsi', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="meja">Meja</label>
                            <input type="text" name="meja" value="<?= set_value('meja'); ?>" class="form-control" id="meja" placeholder="Meja">
                            <?= form_error('meja', '<small class="text-danger pl-3">','</small>'); ?>
                        </div>
                        <div class="form-group mt-3">
                            <a href="<?= base_url('index.php/') ?>Customer/riwayat" class="btn btn-secondary">Kembali</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Pesanan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>