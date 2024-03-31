<?php
namespace Classes;

class PerhitunganNA {
    public static function hitungNilaiAkhir($nilai_partisipasi, $nilai_tugas, $nilai_uts, $nilai_uas ) {
        // Hitung nilai akhir sesuai dengan bobot yang diberikan
        $na = (($nilai_partisipasi*2) + ($nilai_tugas*3) + ($nilai_uts*2) + ($nilai_uas*3))/10;
        return $na;
    }
}