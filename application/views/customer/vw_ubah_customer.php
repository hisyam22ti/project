<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <?php echo $judul; ?>
    </h1>
    <div class="row justify-content-center">
        <div class="col md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Ubah Data Customer
                </div>
                <div class="card-body">
                    <!-- <form action="<?= base_url('index.php/User/update'); ?>" method="post"> -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $user['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama Kauser</label>
                            <input type="text" name="nama" value="<?= $user['nama']; ?>" class="form-control" id="nama"
                                placeholder="Nama Kauser">
                            <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="ruangan">Ruangan</label>
                            <input type="text" name="ruangan" value="<?= $user['ruangan']; ?>" class="form-control"
                                id="ruangan" placeholder="Ruangan">
                            <?= form_error('ruangan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <input type="text" name="jurusan" value="<?= $user['jurusan']; ?>" class="form-control"
                                id="jurusan" placeholder="Jurusan">
                            <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="akreditasi">Akreditasi</label>
                            <input type="text" name="akreditasi" value="<?= $user['akreditasi']; ?>"
                                class="form-control" id="akreditasi" placeholder="Akreditasi">
                            <?= form_error('akreditasi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="nama_kauser">Nama Kauser</label>
                            <input type="text" name="nama_kauser" value="<?= $user['nama_kauser']; ?>"
                                class="form-control" id="nama_kauser" placeholder="Nama Kauser">
                            <?= form_error('nama_kauser', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tahun_berdiri">Tahun Berdiri</label>
                            <input type="text" name="tahun_berdiri" value="<?= $user['tahun_berdiri']; ?>"
                                class="form-control" id="tahun_berdiri" placeholder="Tahun Berdiri">
                            <?= form_error('tahun_berdiri', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="output_lulusan">Output Lulusan</label>
                            <input type="text" name="output_lulusan" value="<?= $user['output_lulusan']; ?>"
                                class="form-control" id="output_lulusan" placeholder="Output Lulusan">
                            <?= form_error('output_lulusan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <img src="<?= base_url('assets/assets/img/user/') . $user['gambar']; ?>" style="width: 100px;" class="img-thumbnail">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar" id="gambar">
                                <label for="gambar" class="custom-file-label">Choose File</label>
                                <?= form_error('gambar', '<small class="text-danger pl-3">','</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <a href="<?= base_url('index.php/') ?>User/" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Ubah
                                User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
