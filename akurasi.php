<div class="page-header">
    <h1>Perhitungan</h1>
</div>
<?php
$error = false;

if ($_POST) {
    $nilai_k = $_POST['nilai_k'];
    $testing_persen = $_POST['testing_persen'];
    $jenis = $_POST['jenis'];
}
?>

<div class="panel panel-success">
    <div class="panel-heading">Pengaturan Training</div>
    <div class="panel-body">
        <?php
        if ($error) print_msg('Isikan semua atribut');
        ?>
        <form class="form-horizontal" method="post">
            <div class="form-group">
                <label class="col-sm-3 control-label">Nilai K</label>
                <div class="col-sm-9">
                    <input class="form-control" type="number" min="1" max="<?= count($KASUS) ?>" name="nilai_k" value="<?= set_value('nilai_k', 5) ?>" />
                    <p class="help-block">Masukkan nilai k</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Prosentase Training</label>
                <div class="col-sm-9">
                    <input class="form-control" type="number" min="10" max="100" name="testing_persen" value="<?= set_value('testing_persen', 10) ?>" />
                    <p class="help-block">Masukkan prosentase training yang akan diambil dari 10 sampe 100</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Data Training</label>
                <div class="col-sm-9">
                    <select class="form-control" name="jenis">
                        <?= get_jenis_option(set_value('jenis')) ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                <div class="col-sm-9">
                    <button class="btn btn-success"><span class="glyphicon glyphicon-signal"></span> Hitung</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
if ($_POST && !$error) include 'akurasi_hasil.php';
?>