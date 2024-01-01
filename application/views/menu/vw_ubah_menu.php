<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <?php echo $judul; ?>
    </h1>
    <div class="row justify-content-center">
        <div class="col md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Menu
                </div>
                <div class="card-body">
                    <!-- <form action="<?= base_url('index.php/Menu/update'); ?>" method="post"> -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $menu['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Menu</label>
                            <input type="text" name="nama" value="<?= $menu['nama']; ?>" class="form-control"
                                id="nama" placeholder="Nama Menu">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <img src="<?= base_url('assets/assets/img/menu/') . $menu['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                            <div class="custom-file">
                                 <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                <label for="gambar" class="custom-file-label">Choose File</label>
                                <?= form_error('gambar', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" value="<?= $menu['harga']; ?>" class="form-control"
                                id="harga" placeholder="Harga">
                            <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group mt-3">
                        <a href="<?= base_url('index.php/') ?>Menu/" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah
                                Menu</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
