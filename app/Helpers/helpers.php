<?php
// app/Helpers/helpers.php

if (!function_exists('rupiah')) {
    function rupiah($angka)
    {
        return 'Rp ' . number_format($angka, 0, ',', '.');
    }
}

if (!function_exists('dateToDMY')) {
    function dateToDMY($tanggal)
    {
        return date('d-m-Y', strtotime($tanggal));
    }
}