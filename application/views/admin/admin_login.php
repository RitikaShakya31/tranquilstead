<?php include('includes/header.php'); ?>

<body style="background: url(assets/img/images/register-background2.png);">
    <div class="account-page pt-sm-5" style="margin-top: 8%;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden"
                        style="border-radius: 15px;box-shadow: rgb(147 147 147 / 35%) 0px 5px 15px;">
                        <div style="background:#306d69;border-bottom: 1px solid #80808042;padding: 15px 8px;">
                            <div class="row">
                                <?php
                                if ($this->session->has_userdata('msg')) {
                                    echo $this->session->userdata('msg');
                                    $this->session->unset_userdata('msg');
                                }
                                ?>
                                <img style="width: 200px;margin: auto;" src="<?= base_url() ?>assets/images/Tranquilstead_Logo.png" alt=""/>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="p-3">
                                <form class="form-horizontal" action="<?= base_url('adminlogin/validatelogin') ?>"
                                    method="post">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="admin_email" name="email"
                                            placeholder="Enter username" />
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="Enter password"
                                                aria-label="Password" aria-describedby="password-addon"
                                                name="password" />
                                            <button class="btn btn-light" type="button" id="password-addon">
                                                <i class="mdi mdi-eye-outline"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mt-3 d-grid">
                                        <button style="background: #306d69;border:none;"
                                            class="btn btn-primary waves-effect waves-light" type="submit">
                                            Log In
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="mt-5 text-center">
                        <div>
                            <p>
                                Don't have an account ?
                                <a href="#" class="fw-medium text-primary"> Signup now </a>
                            </p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->

    <!-- JAVASCRIPT -->
    <script src="<?= base_url() ?>assets/admin/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="<?= base_url() ?>assets/admin/js/app.js"></script>
</body>

</html>