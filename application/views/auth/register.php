<nav class="navbar navbar-primary">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?= base_url('auth') ?>">HOME</a>
        </div>
    </div>
</nav>
<head>
		<title>Form Register</title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	</head>
	<body>
		
	<div class="container">
		<div class="card">
			<div class="card-header">
				Form Register
			</div>
			<div class="card-body">
				<?php 
				if($this->session->flashdata('error') !='')
				{
					echo '<div class="alert alert-danger" role="alert">';
					echo $this->session->flashdata('error');
					echo '</div>';
				}
				?>
				<form method="post" action="<?php echo base_url(); ?>auth/registerProcess">
					<div class="form-group">
						<label for="nim">nim</label>
						<input type="text" class="form-control" name="nim" id="nim" placeholder="Enter Username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
					</div>
                    <div class="form-group">
						<label for="tempat_lahir">Tempat Lahir</label>
						<input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" >
					</div>
                    <div class="form-group">
						<label for="tanggal_lahir">Tanggal Lahir</label>
						<input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" >
					</div>
                    <div class="form-group">
						<select class="form-select" aria-label="Default select example" name="prodi">
							<option value="informatika">Teknik Informatika</option>
							<option value="elektro">Teknik Elektro</option>
							<option value="industri">Teknik Industri</option>
							<option value="mesin">Teknik Mesin</option>
							<option value="teknologi Hasil Pertanian">Teknologi Hasil Pertanian</option>
							<option value="agroteknologi">Agroteknologi</option>
						</select>
					</div>
                    <div class="form-group label-floating" style="display: none;">
                                <label><span class="text-danger"></span></label>
                                <input type="hidden" class="form-control form-control-user" id="fakultas" name="fakultas" value="Sains Dan Teknologi">
                            </div>
                    <div class="form-group">
						<select class="form-select" aria-label="Default select example" name="jk">
							<option value="laki-laki">Laki-Laki</option>
							<option value="perempuan">Perempuan</option>
						</select>
					</div>
					<div class="form-group label-floating" style="display: none;">
                                <label><span class="text-danger"></span></label>
                                <input type="hidden" class="form-control form-control-user" id="id_user_type" name="id_user_type" value="2">
                            </div>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>
	</div>		
	</body>
</html>