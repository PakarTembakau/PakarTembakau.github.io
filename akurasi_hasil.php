<?php
$data = $KASUS;
?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#dataset" data-toggle="collapse">Data Kasus</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="dataset">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Kasus</th>
                    <th>Gejala</th>
                    <th>Penyakit</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($data as $key => $val) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key ?></td>
                    <td><?= implode(', ', $val->gejala) ?></td>
                    <td><?= $PENYAKIT[$val->kode_penyakit]->nama_penyakit ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<?php
function shuffle_assoc(&$array)
{
    $keys = array_keys($array);

    shuffle($keys);

    foreach ($keys as $key) {
        $new[$key] = $array[$key];
    }

    $array = $new;

    return true;
}
$no = 1;
if ($jenis == 'Acak') {
    shuffle_assoc($data);
} else if ($jenis == 'Dari Akhir') {
    krsort($data);
}

$testing = array();
$no = 1;
$batas = $testing_persen / 100 * count($data);
foreach ($data as $key => $val) {
    $testing[$key] = $val;
    if ($no++ >= $batas)
        break;
}
//echo '<pre>' . print_r($testing, 1) . '</pre>';

?>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
            <a href="#testing" data-toggle="collapse">Data Testing</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="testing">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Kasus</th>
                    <th>Gejala</th>
                    <th>Penyakit</th>
                </tr>
            </thead>
            <?php
            $no = 1;
            foreach ($testing as $key => $val) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $key ?></td>
                    <td><?= implode(', ', $val->gejala) ?></td>
                    <td><?= $PENYAKIT[$val->kode_penyakit]->nama_penyakit ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title">
             <a href="#Hasil" data-toggle="collapse">Hasil</a>
        </h3>
    </div>
    <div class="table-responsive collapse" id="Hasil">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr class="nw">
                    <th>No</th>
                    <th>Gejala</th>
                    <th>Penyakit</th>
                    <th>Prediksi</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <?php
            $asli = array();
            $hasil = array();
            $benar = 0;
            foreach ($testing as $key => $val) :
                $fknn = new FKNN($KASUS, $val->gejala, $GEJALA, $nilai_k);
                $asli[$key] = $val->kode_penyakit;
                $hasil[$key] = $fknn->kode_penyakit;
                $benar += $hasil[$key] == $asli[$key];
            ?>
                <tr>
                    <td><?= $key ?></td>
                    <td><?= implode(', ', $val->gejala) ?></td>
                    <td><?= $val->kode_penyakit ?> - <?= $PENYAKIT[$val->kode_penyakit]->nama_penyakit ?></td>
                    <td><code><?= $fknn->kode_penyakit ?> - <?= $PENYAKIT[$fknn->kode_penyakit]->nama_penyakit ?></code></td>
                    <td><?= $hasil[$key] == $asli[$key] ? '&check;' : '' ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div class="panel-footer">
        Training: <?= count($asli) ?><br />
        Benar   : <?= $benar ?><br />
        Salah   : <?= count($asli) - $benar ?><br />
        Akurasi : <?= round($benar / count($asli) * 100, 2) ?>%<br />
    </div>
</div>
<?php

//echo '<pre>' . print_r(array_count_values($hasil), 1) . '</pre>';

$arr = array();
foreach (array_count_values($hasil) as $key => $val) {
    $arr[$key] = array(
        'TP' => 0,
        'FP' => 0,
        'TN' => 0,
        'FN' => 0,
    );
}

foreach ($hasil as $key => $val) {
    $actual = $asli[$key];

    foreach ($arr as $k => $v) {
        if ($k == $val) {
            if ($k == $actual)
                $arr[$k]['TP']++;
            else
                $arr[$k]['FP']++;
        } else {
            if ($k == $actual)
                $arr[$k]['FN']++;
            else
                $arr[$k]['TN']++;
        }
    }
}

foreach ($arr as $key => $val) {
    $total = array_sum($val);
    $arr[$key]['Accuracy'] = ($val['TP'] + $val['TN']) / $total;
    $arr[$key]['Precision'] = $val['TP'] / ($val['TP'] + $val['FP']);
    $arr[$key]['Recall'] = $val['TP'] / ($val['TP'] + $val['FN']);
}

//echo '<pre>' . print_r($arr, 1) . '</pre>';

?>

<div class="panel panel-primary hidden">
    <div class="panel-heading">
        <h3 class="panel-title"><a href="#C7" data-toggle="collapse">Confusion Matrix</a></h3>
    </div>
    <div class="table-responsive collapse in" id="C7">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Klasifikasi</th>
                    <th>TP</th>
                    <th>FP</th>
                    <th>TN</th>
                    <th>FN</th>
                    <th>Accuracy</th>
                    <th>Precision</th>
                    <th>Recall</th>
                </tr>
            </thead>
            <?php foreach ($arr as $key => $val) : ?>
                <tr>
                    <td><?= $key ?></td>
                    <?php foreach ($val as $k => $v) : ?>
                        <td><?= round($v, 3) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
<style type="text/css">
    .nbc_tree {
        margin: 0;
        padding: 0;
    }

    .nbc_tree li {
        list-style: none;
    }

    .nbc_tree ul li {
        margin: 10px;
        position: relative;
    }

    .nbc_tree li:before {
        content: "";
        position: absolute;
        top: -10px;
        left: -20px;
        border-left: 2px solid black;
        border-bottom: 2px solid black;
        border-radius: 0 0 0 0;
        width: 20px;
        height: 20px;
    }

    .nbc_tree li::after {
        position: absolute;
        content: "";
        top: 8px;
        left: -20px;
        border-left: 2px solid black;
        border-top: 2px solid black;
        border-radius: 0 0 0 0;
        width: 20px;
        height: 100%;
    }

    .nbc_tree a {
        min-width: 80px;
    }

    .nbc_tree li:last-child::after {
        display: none
    }

    .nbc_tree li:last-child:before {
        border-radius: 0 0 0 5px
    }

    ul.nbc_tree>li:first-child::before {
        display: none
    }
</style>