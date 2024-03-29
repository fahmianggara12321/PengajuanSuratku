<div class="sidebar" data-active-color="purple" data-background-color="black" data-image="<?= base_url() ?>assets/img/sidebar11.jpg">
    <!-- TODO: hdhsajkd
        Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
        Tip 2: you can also add an image using data-image tag
        Tip 3: you can change the color of the sidebar with data-background-color="white | black"
    -->
    <div class="logo">
        <a href=# class="simple-text logo-mini">
            <i class="material-icons">mail</i>
        </a>
        <a href=# class="simple-text logo-normal">
            Pengajuan<br>Surat
        </a>
    </div>
    <div class="sidebar-wrapper">

        <!-- sidebar admin -->
        <?php if ($this->session->userdata('id_user_type') == 1) : ?>
            <!-- <div class="user"> -->
            <div class="user">
                <div class="photo">
                    <img src="<?= base_url('assets/img/profile/') . $akun['foto'] ?>" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#tukar" class="collapsed">
                        <span>
                            <?= $user['nama'] ?>
                            <b class="caret"></b>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="tukar">
                        <!-- <ul class="nav">
                            <li class="<?= activate_menu('user_profile') ?>">
                                <!-- <a href="<?= base_url('user_profile') ?>">
                                    <span class="sidebar-mini"> <i class="material-icons">perm_identity</i></span>
                                    <span class="sidebar-normal">Akun Saya</span>
                                </a> -->
                            </li>
                            <li class="<?= activate_menu('user_changePass') ?>">
                                <!-- <a href="<?= base_url('user_changePass') ?>">
                                    <span class="sidebar-mini"> <i class="material-icons">vpn_key</i></span>
                                    <span class="sidebar-normal">Ganti Kata Sandi</span>
                                </a> -->
                            </li>
                        </ul> -->
                    </div>
                </div>
            </div>

            <div class="user">

                <ul class="nav">
                    <li class="<?= activate_menu('admin') ?>">
                        <a href="<?= base_url('admin') ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                </ul>
                <!-- </div> -->
            </div>
            <!-- <ul class="nav">
                <li class="<?= activate_menu('ajukan_surat') ?>">
                    <a href="<?= base_url('ajukan_surat') ?>">
                        <i class="material-icons">add_box</i>
                        <p>Ajukan Surat</p>
                    </a>
                </li>
                <li class="<?= activate_menu('surat_saya') ?>">
                    <a href="<?= base_url('surat_saya') ?>">
                        <i class="material-icons">mail</i>
                        <p>Surat Saya</p>
                    </a>
                </li>
            </ul> -->

            <!-- <div class="user"> -->
            <ul class="nav">
                <li class="<?= activate_menu('surat_masuk') ?>">
                    <a href="<?= base_url('surat_masuk') ?>">
                        <i class="material-icons">inbox</i>
                        <p>Permohonan Surat</p>
                    </a>
                </li>
                <li class="<?= activate_menu('semua_surat') ?>">
                    <a href="<?= base_url('semua_surat') ?>">
                        <i class="material-icons">mail</i>
                        <p>Semua Surat</p>
                    </a>
                </li>
                <li class="<?= activate_menu('upload_ttd') ?>">
                    <a href="<?= base_url('upload_ttd') ?>">
                        <i class="material-icons">sign</i>
                        <p>Update Tandatangan</p>
                    </a>
                </li>
                <li class="<?= activate_menu('tambah_ttd') ?>">
                    <a href="<?= base_url('tambah_ttd') ?>">
                        <i class="material-icons">sign</i>
                        <p>Tambah Tandatangan</p>
                    </a>
                </li>
                <!-- <li class="<?= activate_menu('tandatangan') ?>">
                    <a href="<?= base_url('tandatangan') ?>">
                        <i class="material-icons">touch_app</i>
                        <p>Tanda Tangan Surat</p>
                    </a>
                </li>
                <li class="<?= activate_menu('cetak_laporan') ?>">
                    <a href="<?= base_url('cetak_laporan') ?>">
                        <i class="material-icons">local_printshop</i>
                        <p>Cetak Laporan</p>
                    </a>
                </li>
                <li class="<?= activate_menu('user_management') ?>">
                    <a href="<?= base_url('user_management') ?>">
                        <i class="material-icons">people_alt</i>
                        <p>User Management</p>
                    </a>
                </li> -->
            </ul>


            <!-- </div> -->
            <!-- <hr class="sidebar-divider"> -->
        <?php endif; ?>

        <!-- sidebar pimpinan -->
        <?php if ($this->session->userdata('id_user_type') == 3) : ?>
            <!-- <div class="user"> -->
            <div class="user">
                <div class="photo">
                    <img src="<?= base_url('assets/img/profile/') . $akun['foto'] ?>" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#tukar" class="collapsed">
                        <span>
                            <?= $user['nama'] ?>
                            <b class="caret"></b>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="tukar">
                        <ul class="nav">
                            <li class="<?= activate_menu('user_profile') ?>">
                                <!-- <a href="<?= base_url('user_profile') ?>">
                                    <span class="sidebar-mini"> <i class="material-icons">perm_identity</i></span>
                                    <span class="sidebar-normal">Akun Saya</span>
                                </a> -->
                            </li>
                            <li class="<?= activate_menu('user_changePass') ?>">
                                <a href="<?= base_url('user_changePass') ?>">
                                    <span class="sidebar-mini"> <i class="material-icons">vpn_key</i></span>
                                    <span class="sidebar-normal">Ganti Kata Sandi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="user">

                <ul class="nav">
                    <li class="<?= activate_menu('pimpinan') ?>">
                        <a href="<?= base_url('pimpinan') ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                </ul>
                <!-- </div> -->
            </div>

            <!-- <ul class="nav">
                <li class="<?= activate_menu('ajukan_surat') ?>">
                    <a href="<?= base_url('ajukan_surat') ?>">
                        <i class="material-icons">add_box</i>
                        <p>Ajukan Surat</p>
                    </a>
                </li>
                <li class="<?= activate_menu('surat_saya') ?>">
                    <a href="<?= base_url('surat_saya') ?>">
                        <i class="material-icons">mail</i>
                        <p>Surat Saya</p>
                    </a>
                </li>
            </ul> -->
            <!-- <div class="user"> -->
            <ul class="nav">
                <li class="<?= activate_menu('surat_masuk') ?>">
                    <a href="<?= base_url('surat_masuk') ?>">
                        <i class="material-icons">inbox</i>
                        <p>Peromohonan Surat</p>
                    </a>
                </li>

                <li class="<?= activate_menu('semua_surat') ?>">
                    <a href="<?= base_url('semua_surat') ?>">
                        <i class="material-icons">mail</i>
                        <p>Semua Surat</p>
                    </a>
                </li>
            </ul>
            <!-- </div> -->
            <!-- <hr class="sidebar-divider"> -->
        <?php endif; ?>

        <!-- sidebar dosen -->
        <?php if ($this->session->userdata('id_user_type') == 2) : ?>

			<div class="user">
                <div class="photo">
                    <img src="<?= base_url('assets/img/profile/') . $akun['foto'] ?>" />
                </div>
                <div class="info">
                    <a class="collapsed">
                        <span>
                            <?= $user['nama'] ?>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>

            <div class="user">
                <div class="info">
                    <a data-toggle="collapse" href="#tukar" class="<?= activate_menu('ajukan_surat') ?>">
                        <span>
							&nbsp; &nbsp; <i class="material-icons">add_box</i>
                            &nbsp; &nbsp; <?= 'Ajukan Surat' ?>
                            <b class="caret"></b>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse" id="tukar">
                        <ul class="nav">
                            <li class="<?= activate_menu('user_profile') ?>">
                                <a href="<?= base_url('ajukan_surat_pkl') ?>">
                        			<i class="material-icons">arrow_forward</i>
                        				<p>PKL</p>
                    			</a>
                            </li>
                            <li class="<?= activate_menu('user_profile') ?>">
                                <a href="<?= base_url('surat_penelitian') ?>">
                        			<i class="material-icons">arrow_forward</i>
                        				<p>Surat Penelitian</p>
                    			</a>
                            </li>
                            <!-- <li class="<?= activate_menu('user_profile') ?>">
                                <a href="<?= base_url('penilaian_industri') ?>">
                        			<i class="material-icons">arrow_forward</i>
                        				<p>Penilaian (Teknik Industri)</p>
                    			</a>
                            </li> -->
                            <li class="<?= activate_menu('user_profile') ?>">
                                <a href="<?= base_url('aktif_kuliah') ?>">
                        			<i class="material-icons">arrow_forward</i>
                        				<p>Surat Aktif Kuliah</p>
                    			</a>
                            </li>
                            <li class="<?= activate_menu('user_profile') ?>">
                                <a href="<?= base_url('aktif_kuliah_ortu') ?>">
                        			<i class="material-icons">arrow_forward</i>
                        				<p>Surat Aktif Kuliah (Ortu)</p>
                    			</a>
                            </li>
                            <li class="<?= activate_menu('user_profile') ?>">
                                <a href="<?= base_url('izin_perusahaan') ?>">
                        			<i class="material-icons">arrow_forward</i>
                        				<p>Surat Izin Perusahaan</p>
                    			</a>
                            </li>
                        </ul>
                    </div>
                </div>
		</div>

			<ul class="nav">
                <li class="<?= activate_menu('surat_saya') ?>">
                    <a href="<?= base_url('surat_saya') ?>">
                        <i class="material-icons">mail</i>
                        <p>Surat Saya</p>
                    </a>
                </li>
            </ul>
            <!-- </div> -->
            <!-- <hr class="sidebar-divider"> -->
        <?php endif; ?>
        <!-- <div class="user"> -->
        <ul class="nav">
            <li class="#">
                <a href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="material-icons">forward</i>
                    <p>Keluar</p>
                </a>
            </li>
        </ul>
        <!-- </div> -->
    </div>
</div>
