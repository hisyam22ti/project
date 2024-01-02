<main>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">
            <?php echo $judul; ?>
        </h1>
        <div class="row">
            <div class="col-md-12"><a href="<?= base_url('index.php/') ?>Menu/tambah" class="btn btn-info mb-3">Tambah
                    Menu</a>
                <div class="col-md-12">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url('index.php/Menu/') ?>" class="btn btn-info mb-3"><i class="fa-solid fa-burger"></i><i class="fa-solid fa-martini-glass"></i></a>
                    <a href="<?= base_url('index.php/Menu/makan/') ?>" class="btn btn-info mb-3"><i class="fa-solid fa-burger"></i></a>
                    <a href="<?= base_url('index.php/Menu/minum/') ?>" class="btn btn-info mb-3"><i class="fa-solid fa-martini-glass"></i></a>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama Menu</td>
                                <td>Gambar</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($menu as $us) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $us['nama']; ?></td>
                                    <td><img src="<?= base_url('assets/assets/img/menu/') . $us['gambar']; ?>" style="width: 100px; height: 100px;" class="img-thumbnail"></td>
                                    <td><?= $us['harga']; ?></td>
                                    <td>
                                        <?php if ($us['status'] == "Tersedia") { ?>
                                        <a href="<?= base_url('index.php/Menu/ubahstatus/') . $us['id']; ?>" class="btn btn-success"><?= $us['status']; ?></a>
                                        <?php } elseif ($us['status'] == 'Tidak Tersedia') {?>
                                        <a href="<?= base_url('index.php/Menu/ubahstatus/') . $us['id']; ?>" class="btn btn-secondary"><?= $us['status']; ?></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url('index.php/Menu/edit/') . $us['id']; ?>" class="btn btn-warning">Edit</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#menu<?= $us['id']; ?>">
                                            Hapus
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="menu<?= $us['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Apakah anda yakin?</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin menghapus menu "<?= $us['nama']; ?>" ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="<?= base_url('index.php/Menu/hapus/') . $us['id']; ?>"class="btn btn-primary">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <a href="<?= base_url('index.php/Menu/hapus/') . $us['id']; ?>"class="btn btn-danger">Hapus</a> -->
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