<?php

function bacaHTML($url){
     // inisialisasi CURL
     $data = curl_init();
     // setting CURL
     curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
     curl_setopt($data, CURLOPT_URL, $url);
     // menjalankan CURL untuk membaca isi file
     $hasil = curl_exec($data);
     curl_close($data);
     return $hasil;
}

$kodeHTML =  bacaHTML('http://www.klikbca.com');
$pecah = explode('<table width="139" border="0" cellspacing="0" cellpadding="0">', $kodeHTML);

$pecahLagi = explode('</table>', $pecah[2]);
$today = date("j F Y");

echo "<h1>Kurs Rupiah</h1><h3>$today</h3>";
echo "<center><table border='1' style='font-size: large;'>";
echo "<tr>
    <td style='text-align: center; font-size: bold;'>KURS</td>
    <td style='text-align: center; font-size: bold;'>JUAL</td>
    <td style='text-align: center; font-size: bold;'>BELI</td>
    </tr>";
echo $pecahLagi[0];
echo "</table></center>";
?>