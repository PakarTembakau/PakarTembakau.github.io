<?php
error_reporting(E_NOTICE);
session_start();

include 'config.php';
include 'includes/db.php';
include 'includes/paging.php';
$db = new DB($config['server'], $config['username'], $config['password'], $config['database_name']);

$mod = $_GET['m'];
$act = $_GET['act'];

$GEJALA  = array();
$rows = $db->get_results("SELECT * FROM tb_gejala ORDER BY kode_gejala");
foreach ($rows as $row) {
    $GEJALA[$row->kode_gejala] = $row;
}

$PENYAKIT  = array();
$rows = $db->get_results("SELECT * FROM tb_penyakit ORDER BY kode_penyakit");
foreach ($rows as $row) {
    $PENYAKIT[$row->kode_penyakit] = $row;
}

$KASUS  = array();
$rows = $db->get_results("SELECT * FROM tb_kasus ORDER BY kode_kasus, kode_gejala");
foreach ($rows as $row) {
    if (!isset($KASUS[$row->kode_kasus])) {
        $KASUS[$row->kode_kasus] = new Kasus();
        $KASUS[$row->kode_kasus]->kode_kasus = $row->kode_kasus;
        $KASUS[$row->kode_kasus]->kode_penyakit = $row->kode_penyakit;
    }

    $KASUS[$row->kode_kasus]->gejala[$row->kode_gejala] = $row->kode_gejala;
}

function set_msg($msg, $type = 'success')
{
    $_SESSION['message'] = array('msg' => $msg, 'type' => $type);
}

function show_msg()
{
    if ($_SESSION['message'])
        print_msg($_SESSION['message']['msg'], $_SESSION['message']['type']);
    unset($_SESSION['message']);
}


class Kasus
{
    public $kode_kasus;
    public $kode_penyakit;
    public $gejala;
}

class FKNN
{
    public $kasus;
    public $selected;
    public $k;
    private $gejala;

    public $total;
    public $jarak;
    public $n_jarak;
    public $jumlah_jarak;
    public $akar_jarak;
    public $kode_penyakit;

    function __construct($kasus, $selected, $gejala, $k)
    {
        $this->kasus = $kasus;
        $this->selected = $selected;
        $this->gejala = $gejala;
        $this->k = $k;


        $this->jarak = array();
        foreach ($this->kasus as $key => $val) {
            $arr = array_keys(array_count_values(array_merge(array_values($val->gejala), $this->selected)), 1);
            $this->total[$key] = count($arr);
            $this->jarak[$key] = sqrt(count($arr));
        }

        $arr = $this->jarak;
        asort($arr);
        $this->n_jarak = array_slice($arr, 0, $this->k);

        $arr = array();
        foreach ($this->n_jarak as $key => $val) {
            $arr[$this->kasus[$key]->kode_penyakit][$key] = $val;
        }

        $this->jumlah_jarak = array();
        $this->akar_jarak = array();
        foreach ($arr as $key => $val) {
            $this->jumlah_jarak[$key] = array_sum($val);
            $this->akar_jarak[$key] = array_sum($val) / array_sum($this->n_jarak);
        }

        $maxs = array_keys($this->akar_jarak, max($this->akar_jarak));
        $this->kode_penyakit = $maxs[0];
        //echo '<pre>' . print_r($this, 1) . '</pre>';
    }
}
function get_jenis_option($selected = '')
{
    $arr = array(
        'Acak' => 'Acak',
        'Dari Awal' => 'Dari Awal',
        'Dari Akhir' => 'Dari Akhir',
    );
    $a = '';
    foreach ($arr as $key => $val) {
        if ($selected == $key)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}

function set_value($key = null, $default = null)
{
    global $_POST;
    if (isset($_POST[$key]))
        return $_POST[$key];

    if (isset($_GET[$key]))
        return $_GET[$key];

    return $default;
}

function kode_oto($field, $table, $prefix, $length)
{
    global $db;
    $var = $db->get_var("SELECT $field FROM $table WHERE $field REGEXP '{$prefix}[0-9]{{$length}}' ORDER BY $field DESC");
    if ($var) {
        return $prefix . substr(str_repeat('0', $length) . (substr($var, -$length) + 1), -$length);
    } else {
        return $prefix . str_repeat('0', $length - 1) . 1;
    }
}

function get_words($str, $limit = 150)
{
    $str = strip_tags($str);
    $str_arr = explode(' ', $str, $limit + 1);

    if (count($str_arr) > $limit) {
        array_pop($str_arr);
        $str = implode(' ', $str_arr) . '. . .';
    } else {
        $str = implode(' ', $str_arr);
    }
    return $str;
}

function esc_field($str)
{
    return addslashes($str);
}

function redirect_js($url)
{
    echo '<script type="text/javascript">window.location.replace("' . $url . '");</script>';
}

function alert($url)
{
    echo '<script type="text/javascript">alert("' . $url . '");</script>';
}

function print_msg($msg, $type = 'danger')
{
    echo ('<div class="alert alert-' . $type . ' alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $msg . '</div>');
}

function get_penyakit_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kode_penyakit, nama_penyakit FROM tb_penyakit ORDER BY kode_penyakit");
    $a = '';
    foreach ($rows as $row) {
        if ($row->kode_penyakit == $selected)
            $a .= "<option value='$row->kode_penyakit' selected>[$row->kode_penyakit] $row->nama_penyakit</option>";
        else
            $a .= "<option value='$row->kode_penyakit'>[$row->kode_penyakit] $row->nama_penyakit</option>";
    }
    return $a;
}

function get_gejala_option($selected = '')
{
    global $db;
    $rows = $db->get_results("SELECT kode_gejala, nama_gejala FROM tb_gejala ORDER BY kode_gejala");
    $a = '';
    foreach ($rows as $row) {
        if ($row->kode_gejala == $selected)
            $a .= "<option value='$row->kode_gejala' selected>[$row->kode_gejala] $row->nama_gejala</option>";
        else
            $a .= "<option value='$row->kode_gejala'>[$row->kode_gejala] $row->nama_gejala</option>";
    }
    return $a;
}

function get_penyebab_option($selected = '')
{
    $arr = array(
        'Hama' => 'Hama',
        'Penyakit' => 'Penyakit',
    );
    $a = '';
    foreach ($arr as $key => $val) {
        if ($key == $selected)
            $a .= "<option value='$key' selected>$val</option>";
        else
            $a .= "<option value='$key'>$val</option>";
    }
    return $a;
}
