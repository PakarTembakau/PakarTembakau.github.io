<?php
include 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" href="assets/tobacco.png">

  <title>Pakar Tembakau</title>
  <link href="assets/css/simplex-bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/general.css" rel="stylesheet" />
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-nav" style=" margin-left: 10px; margin-top: 7px; margin-bottom: 5px;" href="?">
          <img src="assets/sispar.png" width="90" height="60">
        </a>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav" style="margin-top: 18px; margin-left: 15px; font-size: 16px;">
          <?php if ($_SESSION['login']) : ?>
            <li><a href="?m=penyakit"><span class="glyphicon glyphicon-pushpin"></span> Penyakit</a></li>
            <li><a href="?m=gejala"><span class="glyphicon glyphicon-flash"></span> Gejala</a></li>
            <li><a href="?m=kasus"><span class="glyphicon glyphicon-time"></span> Kasus</a></li>
            <li><a href="?m=konsultasi"><span class="glyphicon glyphicon-stats"></span> konsultasi</a></li>
            <li><a href="?m=akurasi"><span class="glyphicon glyphicon-signal"></span> Akurasi</a></li>
            <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li>
            <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          <?php else : ?>
            <li><a href="?m=konsultasi"><span class="glyphicon glyphicon-stats"></span> Konsultasi</a></li>
            <li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <?php endif ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <?php
    if (file_exists($mod . '.php'))
      include $mod . '.php';
    else
      include 'home.php';
    ?>
  </div>
  <footer class="footer">
    <div class="container">
      <p> Tugas Akhir Rezkian Dezadhan <em class="pull-right">Teknik Informatika 2017</em></p>
    </div>
  </footer>
</body>

</html>