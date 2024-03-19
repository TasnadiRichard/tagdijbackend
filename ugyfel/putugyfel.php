<?php
<<<<<<< HEAD
/* PUT data comes in on the stdin stream */
$putdata = fopen("php://input", "r");
$raw_data = '';
//-- kilobájtonként olvassuk az adatokat
while ($chunk = fread($putdata, 1024))
    $raw_data .= $chunk;

fclose($putdata);
//-- adatok beolvasása JSON formátumban
$adatJSON = json_decode($raw_data);
$azon = $adatJSON->azon;
$nev = $adatJSON->nev;
$szulev = $adatJSON->szulev;
$irszam = $adatJSON->irszam;
$orsz = $adatJSON->orsz;
/*-- A bejövő adatok rendelkezésünkre állnak, 
* kiírjuk az adatbázisba 
* kapcsolat és a megfelelő SQL utasítás segítségével 
* módosítjuk az adatokat
*/
require_once './databaseconnect.php';
$sql = "UPDATE ugyfel SET nev=?, szulev=?, irszam=?, orsz=? WHERE azon=?";
$stmt = $connection->prepare($sql);
$stmt->bind_param("siisi", $nev, $szulev, $irszam, $orsz, $azon);
if ($stmt->execute()) {
    http_response_code(201);
    return json_encode(array("message" => 'Sikeresen módosítva'));
} else {
    http_response_code(404);
    return json_encode(array("message" => 'Nem sikerült módosítani'));
=======
// Összes ügyfél adatai JSON
$sql = '';
if(count($kereSzoveg) > 1){
    if(is_int(intval($kereSzoveg[1]))){
        $sql = "UPDATE `ugyfel` SET `azon`='?',`nev`='?',`szulev`='?',`irszam`='?',`orsz`='?' WHERE 1" . $kereSzoveg[1];
    }else{
        http_response_code(404);
        echo 'Nem létező ügyfél.';
    }
}else{
    $sql = "UPDATE `ugyfel` SET `azon`='?',`nev`='?',`szulev`='?',`irszam`='?',`orsz`='?' WHERE 1";
}
require_once './databaseconnect.php';
$result = $connection->query($sql);
if($result->num_rows > 0){
    $ugyfelek = array();
    while($row = $result->fetch_assoc()){
        $ugyfelek[] = $row;
    }
    http_response_code(200);
    echo json_encode($ugyfelek);
}else{
    http_response_code(404);
    echo 'Nem létező ügyfél.';
>>>>>>> e42d6566b7b2135a62522ecc08070be7d730edda
}