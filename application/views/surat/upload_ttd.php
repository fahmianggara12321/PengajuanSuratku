    <div class="content">
        <div class="container-fluid">
            <?php
            echo form_open_multipart('upload_ttd', 'role="form" class="form" id="save" ');
            ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow">
                        <div class="card-header card-header-icon" data-background-color="purple">
                            <i class="material-icons">mail_outline</i>
                        </div>
                        <div class="card-content">
                            <h4 class="card-title">Perbarui Tandatangan</h4>
                            <?= $this->session->flashdata('time'); ?>
                            <?= $this->session->flashdata('message'); ?>
                            <input type="hidden" name="id_ttd" id="id_ttd" value="<?= $ttd[0]->id_ttd?>">
                            <div class="form-group label-floating" >
                                 <label>prodi<span class="text-danger">*</span></label>
                                  <select class="form-control" name="prodi" id="prodi" onChange="prodis()">
                                  <option value="informatika">informatika</option>
                                        <option value="industri">Teknik industri</option>
                                            <option value="mesin">Teknik mesin</option>
                                            <option value="elektro">Teknik elektro</option>
                                            <option value="pertanian">Teknologi Hasil Pertanian</option>
                                            <option value="agroteknologi">AGROTEKNOLOGI</option>
                                </select>
                                
                            </div>
                            <div class="form-group label-floating">
                                  <label>nama kaprodi<span class="text-danger">*</span></label>
                                 <input type="text" name="nama_kaprodi" class="form-control"
                                 id="nama_kaprodi" value="<?= $ttd[0]->nama_kaprodi?>">
                                </div>
                           
                             <div class="form-group label-floating" style="display: none;">
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
                            <div class="form-group label-floating" style="display: none;">
                                <label>Tanggal Berakhir<span class="text-danger">*</span></label>
                                <?= form_error('tgl_akhir', '<small class="text-danger pl-3">', '</small>'); ?>
                                <input type="text" name="tgl_akhir" class="form-control" required>
                            </div>
                            <script>
                                $('input[name="tgl_akhir"]').daterangepicker({
                                    singleDatePicker: true,
                                    showDropdowns: true,
                                    minDate: new Date("<?php echo $tanggal +1; ?>")
                                });
                            </script>
                             <div class="form-group label-floating">
                                  <label>NIK<span class="text-danger">*</span></label>
                                 <input type="text" name="nik" class="form-control"
                                 id="nik" value="<?= $ttd[0]->nik?>">
                                </div>
                            <div id="formbaru">
                                <div>
                                    <label for="foto_ttd">Tandatangan Baru<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control-file" accept="image/*" name="file" id="foto_ttd" value="<?= $ttd[0]->foto_ttd?>"/>
                                </div>
                                <br>
                            </div>
                           
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="row ">
                <div class="col-md-3"></div>
                <div class="col-lg-6 ">
                    <a type="submit" id='save'class="btn btn-primary btn-block save">
                        Perbarui Tandatangan
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
                                        <input type="text" name="nipajukan[]" id="nim" class="form-control" placeholder="Masukkan NIP Pegawai" required>
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

        function prodis()
        {
            var prodi = document.getElementById("prodi").value;
            if (prodi=='informatika'){
                document.getElementById('id_ttd').value="<?= $ttd[0]->id_ttd?>";
                document.getElementById('nama_kaprodi').value="<?= $ttd[0]->nama_kaprodi?>";
                document.getElementById('nik').value="<?= $ttd[0]->nik?>";
                document.getElementById('foto_ttd').value="<?= $ttd[0]->foto_ttd?>";
                
            }
            else if(prodi=="industri"){
                document.getElementById('id_ttd').value="<?= $ttd[1]->id_ttd?>";
                document.getElementById('nama_kaprodi').value="<?= $ttd[1]->nama_kaprodi?>";
                document.getElementById('nik').value="<?= $ttd[1]->nik?>";
                document.getElementById('foto_ttd').value="<?= $ttd[1]->foto_ttd?>";
                
            }
            else if(prodi=="mesin"){
                document.getElementById('id_ttd').value="<?= $ttd[2]->id_ttd?>";
                document.getElementById('nama_kaprodi').value="<?= $ttd[2]->nama_kaprodi?>";
                document.getElementById('nik').value="<?= $ttd[2]->nik?>";
                document.getElementById('foto_ttd').value="<?= $ttd[2]->foto_ttd?>";
                
            }
            else if(prodi=="elektro"){
                document.getElementById('id_ttd').value="<?= $ttd[3]->id_ttd?>";
                document.getElementById('nama_kaprodi').value="<?= $ttd[3]->nama_kaprodi?>";
                document.getElementById('nik').value="<?= $ttd[3]->nik?>";
                document.getElementById('foto_ttd').value="<?= $ttd[3]->foto_ttd?>";
                
            }
            else if(prodi=="pertanian"){
                document.getElementById('id_ttd').value="<?= $ttd[4]->id_ttd?>";
                document.getElementById('nama_kaprodi').value="<?= $ttd[4]->nama_kaprodi?>";
                document.getElementById('nik').value="<?= $ttd[4]->nik?>";
                document.getElementById('foto_ttd').value="<?= $ttd[4]->foto_ttd?>";
                
            }
            else if(prodi=="agroteknologi"){
                document.getElementById('id_ttd').value="<?= $ttd[5]->id_ttd?>";
                document.getElementById('nama_kaprodi').value="<?= $ttd[5]->nama_kaprodi?>";
                document.getElementById('nik').value="<?= $ttd[5]->nik?>";
                document.getElementById('foto_ttd').value="<?= $ttd[5]->foto_ttd?>";
                
            }
        }
    </script>