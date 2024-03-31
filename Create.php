<?php
spl_autoload_register(function ($class) {
    require_once $class . '.php';
});

use Classes\PerhitunganNA;
use Classes\KonversiNH;

class Create
{
    public static function insert($pdo)
    {

        // Set-up the variables that are going to be inserted
        $nilai_partisipasi = isset($_POST['partisipasi']) ? $_POST['partisipasi'] : NULL;
        $nilai_tugas = isset($_POST['tugas']) ? $_POST['tugas'] : NULL;
        $nilai_uts = isset($_POST['uts']) ? $_POST['uts'] : NULL;
        $nilai_uas = isset($_POST['uas']) ? $_POST['uas'] : null;
        $na = PerhitunganNA::hitungNilaiAkhir($nilai_partisipasi, $nilai_tugas, $nilai_uts, $nilai_uas);
        $nh = KonversiNH::konversiNilaiHuruf($na);


        $stmt = $pdo->prepare('INSERT INTO nilai_matakuliah(partisipasi, tugas, uts, uas, na, nh) VALUES (?, ?, ?, ?, ?, ?)');

        $stmt->execute([$nilai_partisipasi, $nilai_tugas, $nilai_uts, $nilai_uas, $na, $nh]);

        $msg = 'Data berhasil disimpan!';
    }
}
