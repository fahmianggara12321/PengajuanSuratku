<div class="content">
	<div class="container-fluid">
		<!-- Page Heading -->
		<?php if ($akun['password'] === '12345') : ?>
			<div class="alert alert-warning alert-with-icon" data-notify="container">
				<i class="material-icons" data-notify="icon">notifications</i>
				<button type="button" aria-hidden="true" class="close">
					<i class="material-icons" data-dismiss="alert">close</i>
				</button>
				<span data-notify="message">Silakan ganti password terlebih dahulu ======>>> <a href="<?= base_url('user_changePass') ?>"><b><i style="color:white;">change password</i></b></a></span>
			</div>
		<?php endif; ?>
		<?php if ($akun['id_user_type'] === '1') : ?>
			<h5 class="h5 mb-4 text-gray-800">Selamat Datang Administrator!</h5>
		<?php endif; ?>
		<?php if ($akun['id_user_type'] === '3') : ?>
			<h5 class="h5 mb-4 text-gray-800">Selamat Datang! you log in as Pimpinan</h5>
		<?php endif; ?>

		<!-- <?php
		foreach ($statusCount as $data) {
			// $status[] = ;
			$status[$data->status_surat] =  $data->total;
		}
		print_r($status["Pending"]);
		?>
		<p><?php echo json_encode($status); ?></p> -->
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats shadow">
					<div class="card-header" data-background-color="grey">
						<i class="material-icons">schedule</i>
					</div>
					<div class="card-content">
						<p class="category">Surat Pending</p>
						<h3 class="card-title"><?= $pending ?></h3>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card shadow card-stats">
					<div class="card-header" data-background-color="orange">
						<i class="material-icons">close</i>
					</div>
					<div class="card-content">
						<p class="category">Surat Ditolak</p>
						<h3 class="card-title"><?= $disposisi ?></h3>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card shadow card-stats">
					<div class="card-header" data-background-color="blue">
						<i class="material-icons">done</i>
					</div>
					<div class="card-content">
						<p class="category">Surat Disetujui</p>
						<h3 class="card-title"><?= $disetujui ?></h3>
					</div>

				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card shadow card-stats">
					<div class="card-header" data-background-color="green">
						<i class="material-icons">done_all</i>
					</div>
					<div class="card-content">
						<p class="category">Surat Selesai</p>
						<h3 class="card-title"><?= $selesai ?></h3>
					</div>

				</div>
			</div>
		</div>
		<!-- bar chart -->
		<div class="row">
			<div class="col-md-12">
				<div class="card shadow">
					<div class="card-content">
						<canvas id="barChart"></canvas>
					</div>
				</div>
			</div>
		</div>
		<!-- pie chart and penjelasan  -->
		
		<!-- flow diagram  -->
		
	</div>
</div>
</div>

<!-- Berikut Modal Tiap Fakultas -->
<!-- detail syariah-->

<!-- end detail syariah -->

<!-- detail saintek-->

<!-- end detail saintek -->

<!-- detail Dakwah-->

<!-- end detail dakwah -->

<!-- detail ekonomi-->

<!-- end detail dakwah -->

<!-- detail papertapet-->

<!-- end detail papertapet -->

<!-- detail psikologi-->

<!-- end detail psikologi -->

<!-- detail tarbiyah-->

<!-- end detail tarbiyah -->

<!-- detail ushuluddin-->

<!-- END detail ushuludidn -->

<!-- detail pascasajana-->

<!-- persentase surat keluar yang sudah selesai-->


<!-- pie Chart -->
<script>
	// pieChart
	var ctx3 = document.getElementById("pieChart").getContext('2d');
	var pieChart = new Chart(ctx3, {
		type: 'pie',
		data: {
			datasets: [{
				data: ['<?= $ftkP; ?>', '<?= $ushP; ?>', '<?= $psiP; ?>', '<?= $fekonsosP; ?>', '<?= $sihP; ?>', '<?= $fdkP; ?>', '<?= $fstP; ?>', '<?= $pertaP; ?>', '<?= $pascaP; ?>'],
				backgroundColor: [
					'rgba(0, 153, 0, 1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 255, 128, 1)',
					'rgba(179, 89, 0, 1)',
					'rgba(230, 0, 230, 1)',
					'rgba(0, 0, 102, 1)',
					'rgba(255, 102, 0, 1)',
					'rgba(153, 255, 153, 1)',
					'rgba(153, 153, 102, 1)'
				],
				borderColor: [
					'rgba(255, 255, 255,1)',
					'rgba(255, 255, 255,1)',
					'rgba(255, 255, 255,1)',
					'rgba(255, 255, 255,1)',
					'rgba(255, 255, 255,1)',
					'rgba(255, 255, 255,1)',
					'rgba(255, 255, 255,1)',
					'rgba(255, 255, 255,1)',
					'rgba(255, 255, 255,1)',
				],
				label: 'Dataset 1'
			}],
			labels: [
				"Tarbiyah dan Keguruan",
				"Ushuluddin",
				"Psikologi",
				"Ekonomi dan Ilmu Sosial",
				"Syariah dan Ilmu Hukum",
				"Dakwah dan Ilmu Komunikasi",
				"Sains dan Teknologi",
				"Pertanian dan Peternakan",
				"Pascasarjana"
			]
		},
		options: {
			responsive: true
		}

	});
</script>

<!-- bar chart  -->
<script>
	var ctx = document.getElementById("barChart");
	var chartOptions = {
		legend: {
			display: false,
		},
		title: {
			display: true,
			text: 'Grafik Surat Keluar Tahun <?= $year ?>'
		},
		scales: {
			yAxes: [{
				ticks: {
					// max: 50,
					min: 0,
					beginAtZero: true,
					// stepSize: 1
				}
			}]
		} 
	};

	var data = {
		labels: <?= json_encode($label) ?>,
		datasets: [{
			// label: "Jumlah",
			data: <?= json_encode($jumlah) ?>,
			// lineTension: 1,
			// fill: false,
			borderColor: 'purple',
			// backgroundColor: 'transparent',
			borderDash: [5, 4],
			// y: 50,
			pointBorderColor: 'purple',
			pointBackgroundColor: 'rgba(204, 0, 204,0.5)',
			backgroundColor: 'rgba(204, 0, 204,0.5)',
			pointRadius: 5,
			pointHoverRadius: 10,
			pointHitRadius: 30,
			pointBorderWidth: 2,
			pointStyle: 'rectRounded'
		}]
	};

	var myChart = new Chart(ctx, {
		type: 'line',
		data: data,
		options: chartOptions
	});
</script>