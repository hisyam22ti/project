<main>
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">
            <?php echo $judul; ?>
        </h1>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12"><a href="<?= base_url('index.php/') ?>Customer/pesanan" class="btn btn-secondary mb-2">Kembali</a>
                    <?= $this->session->flashdata('message'); ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Menu</td>
                                <td>Deskripsi</td>
                                <td>Porsi</td>
                                <td>Harga</td>
                                <td>Kantin</td>
                                <td>Status</td>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php if ($pesanan) : ?> <!-- Check if $pesanan is not null -->
                                <?php foreach ($pesanan as $us) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $us['menu_nama']; ?></td>
                                        <td><?= $us['deskripsi']; ?></td>
                                        <td><?= $us['porsi']; ?></td>
                                        <td><?= $us['harga']; ?></td>
                                        <td><?= $us['kantin_nama']; ?></td>
                                        <td><span class="badge text-bg-success mb-3"><?= $us['status']; ?></span></td>
                                        <td>
                                            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $us['id']; ?>">
                                                Detail
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop<?= $us['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Pesanan</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b>Pesanan:</b>
                                                            <br>Menu: <?= $us['menu_nama']; ?>
                                                            <br>Deskripsi: <?= $us['deskripsi']; ?>
                                                            <br>Porsi: <?= $us['porsi']; ?>
                                                            <br>Harga: <?= $us['harga']; ?>
                                                            <br>Meja: <?= $us['meja']; ?>
                                                            <br>Status: <?= $us['status']; ?>
                                                            <br>Waktu: <?= $us['date_created']; ?>
                                                            <br><br><b>Kantin:</b>
                                                            <br>Nama: <?= $us['kantin_nama']; ?>
                                                            <br>NO HP Kantin: <?= $us['hp']; ?>
                                                            <br>Email: <?= $us['email']; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="<?= base_url('index.php/Pesanan/riwayattambah/') . $us['menu']; ?>" class="btn btn-primary">Pesan Lagi</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="8">No records found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>