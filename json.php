<?php
header('Content-Type: application/json');

require_once 'pdo.php';

$data = array();
$DB->exec("SET names utf8");
$ilceler = $DB->query("SELECT * FROM ilceler");
$ilcelerArray = $ilceler->fetchAll(PDO::FETCH_ASSOC);

$data = array();
for ($i = 0; $i < count($ilcelerArray); $i ++) {
    $ilce = $ilcelerArray[$i]["ilce"];
    $ilce_id = $ilcelerArray[$i]["id"];
    $eczanelerArray = $DB->query("SELECT * FROM eczaneler WHERE ilce_id = " . $ilce_id);
    
    $eczane = $eczanelerArray->fetchAll(PDO::FETCH_ASSOC);
    for ($x = 0; $x < count($eczane); $x ++) {
        $dat = array(
            "id" => $eczane[$x]["id"],
            "eczane adı" => $eczane[$x]["eczane_adi"],
            "eczacı adı" => $eczane[$x]["eczaci_adi"],
            "adres" => $eczane[$x]["adres"],
            "telefon" => $eczane[$x]["telefon"],
            "fax" => $eczane[$x]["fax"]
        );
        
        $data[$ilce][] = $dat;
    }
}

echo json_encode(array("ilceler" => $data));

// $q = $ilceler->fetchAll(PDO::FETCH_ASSOC);
//print_r($data);
/*
 * echo json_encode(array(
 * "ilceler" => $q
 * ));
 */

?>