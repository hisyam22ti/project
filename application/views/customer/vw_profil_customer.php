<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card mb-3" style="width: 550px;">
        <div class="row no-gutters">
            <div class="col md-4">
                <img src="<?= base_url('assets/assets/img/profile/') . $user['gambar']; ?>" style="width: 540px; height: 540px;" class="mx-auto card-img mb-1 ms-1 mt-1">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user['nama']; ?></h5>
                    <p class="card-text"><?= $user['hp']; ?></p>
                    <p class="card-text"><?= $user['email']; ?></p>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <a href="<?= base_url('index.php/customer/edit/') . $user['id']; ?>" class="btn btn-warning">Edit</a>
    </div>
</div>
