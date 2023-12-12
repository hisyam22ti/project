<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">
        <?php echo $judul; ?>
    </h1>
    <div class="row justify-content-center">
        <div class="col md-8">
            <div class="card">
                <div class="card-header justify-content-center">
                    Form Tambah Data Calon_presiden
                </div>
                <div class="card-body">
                    <form action="<?= base_url('index.php/Calon_presiden/upload'); ?>" method="post">
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" id="nama_lengkap" placeholder="Nama Lengkap">
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" name="nik" class="form-control" id="nik" placeholder="NIK">
                        </div>
                        <div class="form-group">
                            <label for="partai_pendukung">Partai Pendukung</label>
                            <input type="text" name="partai_pendukung" class="form-control" id="partai_pendukung" placeholder="Partai Pendukung">
                        </div>
                        <div class="form-group">
                            <label for="asal">Asal</label>
                            <input type="text" name="asal" class="form-control" id="asal" placeholder="Asal">
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input type="text" name="umur" class="form-control" id="umur" placeholder="Umur">
                        </div>
                        <div class="form-group">
                            <label for="riwayat_pekerjaan">Riwayat Pekerjaan</label>
                            <input type="text" name="riwayat_pekerjaan" class="form-control" id="riwayat_pekerjaan" placeholder="Riwayat Pekerjaan">
                        </div>
                        <div class="form-group mt-3">
                            <a href="<?= base_url('index.php/') ?>Calon_presiden/" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah
                                Calon Presiden</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>