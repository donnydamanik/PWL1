<?php 
namespace Classes;
class KonversiNH {
    public static function konversiNilaiHuruf($na) {
        // Konversi nilai akhir ke dalam nilai huruf sesuai dengan standar Unesa
        if ($na >= 85) {
            return "A";
        } elseif ($na >= 80) {
            return "A-";
        } elseif ($na >= 75) {
            return "B+";
        } elseif ($na >= 70) {
            return "B";
        } elseif ($na >= 65) {
            return "B-";
        } elseif ($na >= 60) {
            return "C+";
        } elseif ($na >= 55) {
            return "C";
        } elseif ($na >= 40) {
            return "D";
        } else {
            return "E";
        }
    }
}