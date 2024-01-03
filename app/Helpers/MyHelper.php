<?php

function format_rupiah($angka)
{
    if ($angka) {
        $rupiah = "Rp " . number_format($angka, 0, ',', '.');
    } else {
        $rupiah = "Rp 0";
    }
    return $rupiah;
}
