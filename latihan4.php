<?php
function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}

function cekKelulusan($nilai) {
    if ($nilai >= 60) {
        return "Lulus";
    }
    return "Tidak Lulus";
}

$hargaAkhir = hitungDiskon(150000, 10);
echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".") . "<br>";

$luas = hitungLuasPersegiPanjang(8, 4);
echo "Luas persegi panjang: " . $luas . "<br>";

echo "Status kelulusan (nilai 75): " . cekKelulusan(75);
?>