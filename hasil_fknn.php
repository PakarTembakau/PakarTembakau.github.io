<?php
//echo '<pre>';
$fknn = new FKNN($KASUS, $selected, $GEJALA, 5);
//echo '</pre>';
?>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title"><a href="#gejala" data-toggle="collapse">Gejela Terpilih</a></h3>
	</div>
	<div class="table-responsive collapse in" id="gejala">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama</th>
				</tr>
			</thead>
			<?php
			$no = 1;
			foreach ($selected as $key => $val) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $val ?></td>
					<td><?= $GEJALA[$val]->nama_gejala ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title"><a href="#jarak" data-toggle="collapse">Jarak</a></h3>
	</div>
	<div class="table-responsive collapse in" id="jarak">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Gejala</th>
					<th>Total</th>
					<th>Hasil</th>
				</tr>
			</thead>
			<?php
			$no = 1;
			foreach ($fknn->total as $key => $val) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= implode(',', $fknn->kasus[$key]->gejala) ?></td>
					<td><?= $val ?></td>
					<td><?= round($fknn->jarak[$key], 3) ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title"><a href="#hasil" data-toggle="collapse"> (k=<?= $fknn->k ?>)</a></h3>
	</div>
	<div class="table-responsive collapse in" id="hasil">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Kasus</th>
					<th>Gejala</th>
					<th>Penyakit</th>
					<th>Total</th>
				</tr>
			</thead>
			<?php
			$no = 1;
			foreach ($fknn->n_jarak as $key => $val) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $key ?></td>
					<td><?= implode(',', $fknn->kasus[$key]->gejala) ?></td>
					<td><?= $fknn->kasus[$key]->kode_penyakit ?></td>
					<td><?= round($val, 3) ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title"><a href="#fknn" data-toggle="collapse">Fuzzy KNN</a></h3>
	</div>
	<div class="table-responsive collapse in" id="fknn">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Penyakit</th>
					<th>Jumlah</th>
					<th>Akar</th>
				</tr>
			</thead>
			<?php
			$no = 1;
			foreach ($fknn->jumlah_jarak as $key => $val) : ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $key ?></td>
					<td><?= round($val, 3) ?></td>
					<td><?= round($fknn->akar_jarak[$key], 3) ?></td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
	<div class="panel-footer">
		<p>Berdasarkan perhitungan maka diagnosa penyakit yang diderita adalah <b><?= $PENYAKIT[$fknn->kode_penyakit]->nama_penyakit ?></b> dengan Besar nilai <b><?= round($fknn->akar_jarak[$fknn->kode_penyakit], 4) ?></b>.</p>
		<h4><?= $PENYAKIT[$fknn->kode_penyakit]->nama_penyakit ?></h4>
		<p><b>Penyebab</b>: <?= $PENYAKIT[$fknn->kode_penyakit]->penyebab ?></p>
		<p><b>Solusi</b>: <?= $PENYAKIT[$fknn->kode_penyakit]->solusi ?></p>
	</div>
</div>