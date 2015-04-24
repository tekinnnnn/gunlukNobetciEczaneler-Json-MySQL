<?php
header('Content-Type: text/html; charset=utf-8');

require_once 'ilceler.php';
$DB->exec("SET names utf8");

for ($ilce = 0; $ilce < count($ilcelerveri); $ilce ++) {
    
    $url = $ilcelerveri[$ilce][1];
    preg_match_all('/<table>(.*?)<\/table>/is', curl($url), $veri_derece_2); // ilçede tablonun içi geldi
                     
    // $veri_derece_2[1][0] // tr içerisinde kopmle eczaneler
    
    preg_match_all('/<strong>(.*?)<\/strong>.*?<div align="right">Eczacı : <div\/><\/td><td height="25" bgcolor="#e8e8e8">(.*?)<\/td><\/tr>.*?<div align="right">Adres : <div\/><\/td><td height="25" bgcolor="#e8e8e8">(.*?)<\/td><\/tr><tr>.*?<div align="right">Tel : <div\/><\/td><td height="25" bgcolor="#e8e8e8">(.*?)<\/td><\/tr><tr>.*?<div align="right">Fax : <div\/><\/td><td height="25" bgcolor="#e8e8e8">(.*?)<\/td>/is', $veri_derece_2[1][0], $veri_derece_3); // ilçede tablonun içinde eczane
                                           // isimleri geldi
    for ($eczane = 0; $eczane < count($veri_derece_3[1]); $eczane ++) {
        $ilceId = $ilce + 1;
        $query = $DB->exec("INSERT INTO eczaneler VALUES (null,'" . $ilceId . "','" . $veri_derece_3[1][$eczane] . "','" . $veri_derece_3[2][$eczane] . "','" . $veri_derece_3[3][$eczane] . "','" . $veri_derece_3[4][$eczane] . "','" . $veri_derece_3[5][$eczane] . "', null)");
        // sleep(1);
    }
}

echo "<script>window.location.href='json.php';</script>";

?>