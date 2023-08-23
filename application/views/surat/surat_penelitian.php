    <div class="content">
        <div class="container-fluid">
            <?php
            echo form_open_multipart('surat_penelitian', 'role="form" class="form" id="save" ');
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">mail_outline</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Isi Surat</h4>
                            <?= $this->session->flashdata('time'); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <div class="form-group label-floating" style="display: none;">
                                <label><span class="text-danger"></span></label>
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input type="hidden" class="form-control form-control-user" id="jenis_surat" name="jenis_surat" value="Ajukan Surat Penelitian">
                            </div>
							<div class="form-group label-floating">
                                <label>Semester<span class="text-danger">*</span></label>
                                <?= form_error('semester', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input type="text" class="form-control form-control-user" id="semester" name="semester">
                            </div>
							<div class="form-group label-floating">
                                <label>Nama Tempat Penelitian<span class="text-danger">*</span></label>
                                <?= form_error('tempat_penelitian', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input type="text" class="form-control form-control-user" id="tempat_penelitian" name="tempat_penelitian">
                            </div>
							<div class="form-group label-floating">
                                <label>Lokasi Penelitian<span class="text-danger">*</span></label>
                                <?= form_error('lokasi_penelitian', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input type="text" class="form-control form-control-user" id="lokasi_penelitian" name="lokasi_penelitian">
                            </div>
                            <div class="form-group label-floating" style="display: none;" >
                                <?php $tanggal = date('Y-m-d'); ?>
                                <label>Tanggal Mulai<span class="text-danger">*</span></label>
                                <?= form_error('tgl_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input type="text" name="tgl_mulai" min="<?= $tanggal ?>" class="form-control">
                                <script>
                                    $('input[name="tgl_mulai"]').daterangepicker({
                                        singleDatePicker: true,
                                        showDropdowns: true,
                                        minDate: new Date("<?php echo $tanggal; ?>")
                                    });
                                </script>
                            </div>
                            <div class="form-group label-floating" style="display: none;" >
                                <label>Tanggal Berakhir<span class="text-danger">*</span></label>
                                <?= form_error('tgl_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input type="text" name="tgl_akhir" class="form-control" required>
                            </div>
                            <script>
                                $('input[name="tgl_akhir"]').daterangepicker({
                                    singleDatePicker: true,
                                    showDropdowns: true,
                                    minDate: new Date("<?php echo $tanggal +1;?>")
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" style="display: none;">
                    <div class="card shadow">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">people_outline</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Dosen Pembimbing</h4>
                            <?= $this->session->flashdata('nipajukan'); ?>

                            <br>
                            <div class="form-group label-floating after-add-more">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="text" name="nipajukan[]" id="nim" class="form-control" placeholder="Masukkan NIM" value="" required>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="status_dlm_tim[]" class="form-control" placeholder="Status" value="Nama Dosen" readonly>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $("#nip").autocomplete({
                                    source: "<?php echo site_url('ajukan_surat/get_nip_dosen'); ?>",
                                    select: function(event, ui) {
                                        $('[name="nipajukan"]').val(ui.item.label);
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-3"></div>
                <div class="col-lg-6 ">
                    <a type="submit" id='save' class="btn btn-primary btn-block save">
                        Ajukan Surat
                    </a>
                </div>
                <div class="col-md-3"></div>
            </div>

        </div>
        </form>
    </div>
    </div>

    <!-- script untuk menampilkan notice sebelum save -->
    <script>
        $('.save').on("click", function(e) {
            e.preventDefault();
            var url = $(this).parents('#save');
            swal({
                    title: "Are you sure?",
                    text: "Apakah data sudah benar?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Ya!',
                    cancelButtonText: "Tidak, Batal!",
                    confirmButtonClass: "btn-success",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        url.submit();
                    } else {
                        swal("Cek kembali");
                    }
                });
        });
    </script>
 <!-- add more -->
 <script type="text/javascript">
        $(document).ready(function() {
            $(".add-more").click(function() {
                var html = $(`
                <div class="copy d-none">
                    <div class="form-group label-floating style="margin-top:10px">
                                <div class="row">
                                    <div class="col-md-7">
                                        <input type="text" name="nipajukan[]" id="nip" class="form-control" placeholder="Masukkan NIP Pegawai" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="status_dlm_tim[]" class="form-control" placeholder="Status" value="Anggota TIM" readonly>
                                    </div>
                                    <div class="col-md-2 ">
                                        <a class="btn btn-round btn-xs btn-danger remove"><i class="fa fa-trash"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                `).html();
                $(".after-add-more").after(html);
            });
            $("body").on("click", ".remove", function() {
                $(this).parents(".form-group").remove();
            });
        });
    </script>