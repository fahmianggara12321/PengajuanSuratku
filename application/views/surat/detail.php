<div class="content">
    <div class="container-fluid">
        <!-- berikut tampil data detail surat tugas -->
        <?= $this->session->flashdata('message'); ?>
        <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->
            <!-- detail isi surat -->
            <div class="card-content text-dark">
                <h3 class="text-center">Detail Isi Surat</h3>
                <div class="row">
                    <h6 class="col-lg-3"><b>Tanggal surat dibuat</b></h6>
                    <h6 class="col-lg-1">:</h6>
                    <h6 class="col-lg-8"><?= date('d F Y', strtotime($detail['tanggal_surat_masuk'])); ?></h6>
                </div>
                <?php if ($detail['status_surat'] === 'Disposisi' || $detail['status_surat'] === 'Disetujui' || $detail['status_surat'] === 'Selesai') : ?>
                    <div class="row">
                        <h6 class="col-lg-3"><b>Nomor Surat</b></h6>
                        <h6 class="col-lg-1">:</h6>
                        <h6 class="col-lg-8"><?= $detail['no_surat']; ?></h6>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <h6 class="col-lg-3"><b>Pemohon</b></h6>
                    <h6 class="col-lg-1">:</h6>
                    <h6 class="col-lg-8"><?= $detail['nama'] ?></h6>
                </div>
                <div class="row">
                    <h6 class="col-lg-3"><b>NIM</b></h6>
                    <h6 class="col-lg-1">:</h6>
                    <h6 class="col-lg-8"><?= $detail['nim'] ?></h6>
                </div>
                <div class="row">
                    <h6 class="col-lg-3"><b>Fakultas/Prodi</b></h6>
                    <h6 class="col-lg-1">:</h6>
                    <h6 class="col-lg-8"> <?= $detail['fakultas'] . ' / ' . $detail['prodi'] ?></h6>
                </div>
                <div class="row">
                    <h6 class="col-lg-3"><b>Status surat</b></h6>
                    <h6 class="col-lg-1">:</h6>
                    <h6 class="col-lg-8"><?= $detail['status_surat'] ?></h6>
                </div>
                <div class="row">
                    <h6 class="col-lg-3"><b>Jenis Surat</b></h6>
                    <h6 class="col-lg-1">:</h6>
                    <h6 class="col-lg-8"><?= $detail['jenis_surat'] ?></h6>
                </div>
                <div class="row" style="display: none;">
                    <h6 class="col-lg-3"><b>Lokasi Pelaksanaan</b></h6>
                    <h6 class="col-lg-1">:</h6>
                    <h6 class="col-lg-8"><?= $detail['lokasi_penelitian'] ?></h6>
                </div>
                <div class="row" style="display: none;">
                    <h6 class="col-lg-3"><b>Tanggal Berangkat</b></h6>
                    <h6 class="col-lg-1">:</h6>
                    <h6 class="col-lg-8"> <b><?= day_indo($detail['tgl_mulai']) ?></b>, dari tanggal <b><?= date('d F Y', strtotime($detail['tgl_mulai'])); ?></b> sampai tanggal <b><?= date('d F Y', strtotime($detail['tgl_akhir'])); ?></b>
                        <br>
                        Terhitung selama <b><?= $detail['lama_tugas'] ?> Hari</b></h6>
                </div>
                <?php if ($detail['rekom_dinas'] == 'Iya') : ?>
                    <h6 class="text-danger"><b>Surat ini membutuhkan rekomendasi dinas PMTSP, berikut lampirannya:</b></h6>
                    <div class="row">
                        <h6 class="col-lg-3"><b>Foto KTP</b></h6>
                        <h6 class="col-lg-1">:</h6>
                        <h6 class="col-lg-8">Lihat <a href="#" data-toggle="modal" data-target="#lihatktp"><i class="material-icons">remove_red_eye</i></a> </h6>
                    </div>
                    <div class="row">
                        <h6 class="col-lg-3"><b>Proposal</b></h6>
                        <h6 class="col-lg-1">:</h6>
                        <h6 class="col-lg-8">Lihat <a href='<?= base_url('assets/upload/proposal/' . $detail['proposal']) ?>' target="_blank"><i class="material-icons">remove_red_eye</i></a> </h6>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- berikut tampil data anggota tim -->
        <div class="card shadow mb-4">
            <!-- <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div> -->

            <div class="card-content text-dark">
                <h3 class="text-center">Anggota Kelompok</h3>
                
                <?php foreach ($detail_tim as $tim) : ?>
                    <div class="row">
                        <h6 class="col-lg-3"><b>Nama</b></h6>
                        <h6 class="col-lg-1">:</h6>
                        <h6 class="col-lg-8"> <?= $tim->nama1  ?></h6>
                    </div>
                    <div class="row">
                        <h6 class="col-lg-3"><b>Nim</b></h6>
                        <h6 class="col-lg-1">:</h6>
                        <h6 class="col-lg-8"> <?= $tim->nim1  ?></h6>
                    </div>
                    <hr class="sidebar-divider">
                <?php endforeach; ?>
            </div>
        </div>

        <div class="row mb-4 centered">


            <!-- tampil detail aksi sesuai status Pending dan user type -->
            <?php if ($detail['status_surat'] === 'Pending' && $this->session->userdata('id_user_type') === '2') : ?>
                <div class="col-md-4 text-center"></div>
                <div class="col-md-4 text-center">
                    <a href="#" data-toggle="modal" data-target="#editsp" class="btn btn-info">
                        <span class="icon text-white-60">
                            <i class="material-icons">edit</i>
                        </span>
                        <span class="text">Edit</span>
                    </a>

                </div>
            <?php elseif ($detail['status_surat'] === 'Pending' && $this->session->userdata('id_user_type') === '1') : ?>
                <div class="col-md-12 text-center"></div>
                <div class="col-md-6 text-center">
                    <a href="#" data-toggle="modal" data-target="#disposisi" class="btn btn-info">
                        <span class="icon text-white-60">
                            <i class="material-icons">check</i>
                        </span>
                        <span class="text">Proses Surat</span>
                    </a>
                </div>
				<div class="col-md-6 text-center">
                    <a href="#" data-toggle="modal" data-target="#deletesb" class="btn btn-danger">
                        <span class="icon text-white-60">
                            <i class="material-icons">delete</i>
                        </span>
                        <span class="text">Delete</span>
                    </a>
                </div>

            <?php endif; ?>
			
			



            <!-- tampil detail aksi sesuai status Disposisi dan user type -->
            <?php if ($detail['status_surat'] === 'Disposisi' && $this->session->userdata('id_user_type') === '1') : ?>
                <div class="col-md-4 text-center"></div>
                <div class="col-md-4 text-center">
                    <a href="<?= base_url('surat_masuk/disetujui/') . $detail['id_surat'] ?>" class="btn btn-success">
                        <span class="icon text-white-60">
                            <i class="material-icons">check</i>
                        </span>
                        <span class="text">Setujui Surat</span>
                    </a>
                </div>
            <?php endif; ?>


            <!-- tampil detail aksi sesuai status Disetujui dan user type -->
            <?php if ($detail['status_surat'] === 'Disetujui' && $this->session->userdata('id_user_type') === '1') : ?>
                <div class="col-md-4 text-center"></div>
                <div class="col-md-4 text-center">
                    <a target="_blank" href="<?= base_url('cetak_surat/cetak/') . $detail['id_surat'] ?>" class="btn btn-info">
                        <span class="icon text-white-60">
                            <i class="material-icons">check</i>
                        </span>
                        <span class="text">Buat Surat</span>
                    </a>
                </div>
            <?php endif; ?>

            <!-- tampil detail aksi sesuai status Selesai dan user type
            <?php if ($detail['status_surat'] === 'Selesai') : ?>
                <div class="col-md-5 text-center">
                    <a href="#" class="btn btn-info">
                        <span class="icon text-white-60">
                            <i class="material-icons">edit</i>
                        </span>
                        <span class="text">Download Surat Tugas</span>
                    </a>
                </div>
                <div class="col-md-2 text-center"></div>
                <div class="col-md-5 text-center">
                    <a href="#" class="btn btn-danger">
                        <span class="icon text-white-60">
                            <i class="material-icons">delete</i>
                        </span>
                        <span class="text">Download Surat Rekomendasi</span>
                    </a>
                </div>
            <?php endif; ?> -->
        </div>

    </div>
</div>
</div>

<!-- Hapus Surat  Modal-->
<div class="modal fade" id="deletesb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?= form_open_multipart('surat_saya/delete/' . $detail['id_surat']) ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            </div> -->
            <div class="modal-body text-center">
                <h4 class="card-title">Yakin ingin menghapus surat ini??</h4>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary pull-left" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Yakin</button>
            </div>
        </div>
    </div>
    </form>
</div>
</div>

<!-- insert no surat Modal-->
<div class="modal fade" id="disposisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?= form_open_multipart('surat_masuk/disposisi_surat') ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            </div> -->
            <div class="modal-body">
                <div class="row">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">mail_outline</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Masukkan Nomor Surat</h4>
                            <div class="form-group label-floating">
                                <label>Nomor Surat<span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-user" id="nomor_surat" name="nomor_surat" onchange="myFunction()">
                                <input type="hidden" name="id_surat" value="<?= $detail['id_surat'] ?>">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary pull-left" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit" id="submitDisposisi">Lanjut</button>
            </div>
        </div>
    </div>
    </form>
</div>

<!-- Edit Isi Surat Pending Modal-->
<div class="modal fade" id="editsp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?= form_open_multipart('surat_saya/update_isi/' . $detail['id_detail_surat']) ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
            </div> -->
            <div class="modal-body">
                <div class="row">
                    <div class="card">
                        <div class="card-header card-header-icon" data-background-color="rose">
                            <i class="material-icons">mail_outline</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Isi Surat</h4>
                            <div class="form-group label-floating">
                                <?php $tanggal = date('Y-m-d'); ?>
                                <label>Tanggal Mulai<span class="text-danger">*</span></label>
                                <input type="text" name="tgl_mulai" value="<?= date('m-d-Y', strtotime($detail['tgl_mulai'])) ?>" min="<?= $tanggal ?>" class="form-control">
                                <script>
                                    $('input[name="tgl_mulai"]').daterangepicker({
                                        singleDatePicker: true,
                                        showDropdowns: true,
                                        minDate: new Date("<?php echo $tanggal; ?>")
                                    });
                                </script>
                            </div>
                            <div class="form-group label-floating">
                                <label>Tanggal Berakhir<span class="text-danger">*</span></label>
                                <input type="text" value="<?= date('m-d-Y', strtotime($detail['tgl_akhir'])) ?>" name="tgl_akhir" class="form-control">
                            </div>
                            <script>
                                $('input[name="tgl_akhir"]').daterangepicker({
                                    singleDatePicker: true,
                                    showDropdowns: true,
                                    minDate: new Date("<?php echo $tanggal; ?>")
                                });
                            </script>
                            <div class="form-group label-floating">
                                <label>Tujuan Penelitian<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-user" id="tujuan_penelitian" value="<?= $detail['tujuan_penelitian'] ?>" name="tujuan_penelitian">
                                <input type="hidden" name="id_detail_surat" value="<?= $detail['id_detail_surat'] ?>">
                            </div>
                            <div class="form-group label-floating">
                                <label>Judul Penelitian<span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-user" id="judul_penelitian" value="<?= $detail['judul_penelitian'] ?>" name="judul_penelitian">
                            </div>
                            <?php if ($detail['rekom_dinas'] === 'Iya') : ?>
                                <input type="hidden" name="rekom_dinas" value="<?= $detail['rekom_dinas'] ?>">
                                <div>
                                    <label for="foto_ktp">Foto KTP</label>
                                    <input type="file" name="foto_ktp" />
                                    <input type="hidden" name="ktp" value="<?= $detail['foto_ktp'] ?>">
                                </div>
                                <div>
                                    <label for="proposal">File Proposal</label>
                                    <input type="file" name="proposal" />
                                    <input type="hidden" name="props" value="<?= $detail['proposal'] ?>">
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary pull-left" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </div>
    </div>
    </form>
</div>

<script>
    // function goodEmptyCheck(value) {
    //     Object.keys(value).length === 0 && value.constructor === Object // 👈 constructor check
    // }

    function myFunction() {
        var match = false;
        var daftar = <?php echo json_encode($list_surat); ?>;
        console.log(daftar);
        for (var i in daftar) {
            // console.log(daftar[i]['no_surat']);
            if (daftar[i]['no_surat'] !== null){
                if(daftar[i]['no_surat'].split("/")[0] == document.getElementById("nomor_surat").value) match = true;
            }
        }

        if(match==true){
            // alert("disabled");
            document.getElementById("submitDisposisi").disabled = true;
            alert("Nomor Surat Terakhir Adalah "+daftar[1]['no_surat'].split("/")[0]);
        }
        else{
            // alert("enabled");
            document.getElementById("submitDisposisi").disabled = false;
        }
    }

</script>