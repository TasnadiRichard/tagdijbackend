<?php
<<<<<<< HEAD

$sql = '';
if (count($kereSzoveg) > 1) {
    if (is_int(intval($kereSzoveg[1]))) {
        $sql = 'DELETE FROM ugyfel WHERE azon=' . $kereSzoveg[1];
    } 
}else {
    http_response_code(404);
    echo 'Nem létező ügyfél';
}
require_once './databaseconnect.php';

if ($result = $connection->query($sql)) {
    http_response_code(201);
    echo 'Sikeres törlés';
} else {
    http_response_code(404);
    echo 'Sikertelen törlés';
=======
// Összes ügyfél adatai JSON
$sql = '';
if(count($kereSzoveg) > 1){
    if(is_int(intval($kereSzoveg[1]))){
        $sql = "DELETE FROM ugyfel WHERE azon=" . $kereSzoveg[1];
    }else{
        http_response_code(404);
        echo 'Nem létező ügyfél.';
    }
}else{
    $sql = "DELETE FROM `ugyfel` WHERE 1";
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