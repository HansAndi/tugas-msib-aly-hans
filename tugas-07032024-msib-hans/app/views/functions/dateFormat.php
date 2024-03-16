<?php
function dateFormat($date)
{
    $pisah = explode(' ', $date);
    $date = $pisah[0];
    $waktu = $pisah[1] ?? '';

    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $split = explode('-', $date);
    $formatted_date = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

    if ($waktu) {
        $formatted_date .= ' ' . $waktu;
    }

    return $formatted_date;
}
?>