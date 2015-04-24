<?php
//<meta charset="iso-8859-9">

header('Content-Type: text/html; charset=iso-8859-9');

require_once 'pdo.php';
$bugun = date("d.m.Y");
function curl ($url)
{
    $ch = curl_init();
    $hc = "YahooSeeker-Testing/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; Yahoo! Search - Web Search)";
    curl_setopt($ch, CURLOPT_ENCODING , "gzip");
    curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_USERAGENT, $hc);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $site = curl_exec($ch);
    curl_close($ch);
    return $site;
}
$url = "http://www.istanbulsaglik.gov.tr/w/nobet/liste.asp?lc=0&gun=$bugun";
preg_match_all(
        '/<a href = ".*?NobetciEczaneler\(\'(.*?)\'\)"><font.*?>(.*?)<\/font>.*?<\/a>/is', 
        curl($url), $veri_derece_1);

$ilcesayisi = count($veri_derece_1[2]);
$ilcelerveri = array();

for ($i = 0; $i < $ilcesayisi; $i ++) { // ilçeler ve linkler geldi
    $ilce = $veri_derece_1[2][$i];
    $link = "http://apps.istanbulsaglik.gov.tr/eczane/GetNobetciEczaneler.aspx" .
             $veri_derece_1[1][$i];
    // echo $ilce . " : " . $link . "<br>";

    //mb_internal_encoding('UTF-8');
    $ilcelerveri[] = array(
            //mb_strtolower($ilce,'UTF-8'),
            //mb_strtoupper($ilce, 'iso-8859-9'),
            //mb_strtoupper($ilce, 'windows-1254'),
            $ilce,
            $link
    );
    
    //echo $ilcelerveri[$i][0]." ".$ilce."<br>";
    $DB->exec("INSERT INTO ilceler VALUES(null, '".$ilcelerveri[$i][0]."', '".$ilcelerveri[$i][1]."')");
}


?>