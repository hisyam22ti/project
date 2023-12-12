<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register</title>
    <link href="<?= base_url('assets/') ?>css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('index.php/auth/registrasi'); ?>" method="post">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="nama" name="nama" value="<?= set_value('nama'); ?>" type="text" placeholder="Nama" />
                                            <?= form_error('nama', '<small class="text_danger pl-3">','</small>'); ?>
                                            <label for="nama">Nama</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" type="email" placeholder="Email Address" />
                                            <?= form_error('email', '<small class="text_danger pl-3">','</small>'); ?>
                                            <label for="email">Email Address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password1" name="password1" value="<?= set_value('password1'); ?>" type="password" placeholder="Password" />
                                            <?= form_error('password1', '<small class="text_danger pl-3">','</small>'); ?>
                                            <label for="password1">Password</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password2" name="password2" value="<?= set_value('password2'); ?>" type="password" placeholder="Password" />
                                            <?= form_error('password2', '<small class="text_danger pl-3">','</small>'); ?>
                                            <label for="password2">Confirm Password</label>
                                        </div>
                                        <div class="mt-4 mb-0">
                                        <button type="submit" class="btn btn-primary float-right">Regis</button>
                                            <!-- <div class="d-grid"><a class="btn btn-primary btn-block">Create Account</a></div> -->
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="<?= base_url('index.php/Auth') ?>">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/') ?>js/scripts.js"></script>
</body>
</html>