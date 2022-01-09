<div class="page-header">
    <h1>Hasil Konsultasi</h1>
</div>
<?php
$selected = (array) $_POST['gejala'];
if (!$selected) :
    print_msg('Belum ada gejala terpilih. <a href="?m=konsultasi">Kembali</a>');
else :
    include 'hasil_fknn.php';
endif; ?>