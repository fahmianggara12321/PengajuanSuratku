<div class="content">
    <div class="container-fluid">
        <!-- Page Heading -->
        <?php if ($akun['password'] === '12345') : ?>
            <div class="alert alert-warning alert-with-icon" data-notify="container">
                <i class="material-icons" data-notify="icon">notifications</i>
                <button type="button" aria-hidden="true" class="close">
                    <i class="material-icons" data-dismiss="alert">close</i>
                </button>
                <span data-notify="message">Silahkah ganti password terlebih dahulu ======>>> <a href="<?= base_url('user_changePass') ?>"><b><i style="color:white;">change password</i></b></a></span>
            </div>
        <?php endif; ?>
        <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

        
    </div>
</div>
</div>