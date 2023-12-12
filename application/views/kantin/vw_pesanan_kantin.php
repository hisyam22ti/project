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
                            <td>No</td>
                            <td>Menu</td>
                            <td>Deskripsi</td>
                            <td>Porsi</td>
                            <td>Harga</td>
                            <td>Meja</td>
                            <td>Customer</td>
                            <td>Status</td>
                            <td>Action</td>
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
                                    <td><?= $us['meja']; ?></td>
                                    <td><?= $us['customer_nama'];?></td>
                                    <td><?= $us['status'];?></td>
                                    <td>
                                        <a href="<?= base_url('index.php/Pesanan/ubahstatus/') . $us['id']; ?>" class="btn btn-warning">Edit</a>
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
</main>