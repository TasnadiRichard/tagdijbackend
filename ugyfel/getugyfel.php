<?php

//-- osszes ugyfel adatai JSON-ben
$sql = '';
<<<<<<< HEAD
if (count($kereSzoveg) > 1) {
    if (is_int(intval($kereSzoveg[1]))) {
        $sql = 'SELECT * FROM ugyfel WHERE azon=' . $kereSzoveg[1];
    } else {
=======
if(count($kereSzoveg) > 1){
    if(is_int(intval($kereSzoveg[1]))){
        $sql = "SELECT * FROM ugyfel WHERE azon=" . $kereSzoveg[1];
    }else{
>>>>>>> e42d6566b7b2135a62522ecc08070be7d730edda
        http_response_code(404);
        return json_encode(array("message" => 'Nem létező ügyfél'));
    }
} else {
    $sql = 'SELECT * FROM ugyfel WHERE 1';
}
require_once './databaseconnect.php';
$result = $connection->query($sql);
if ($result->num_rows > 0) {
    $ugyfelek = array();
    while ($row = $result->fetch_assoc()) {
        $ugyfelek[] = $row;
    }
    http_response_code(200);
    echo json_encode($ugyfelek);
} else {
    http_response_code(404);
    return json_encode(array("message" => 'Nincs egy ügyfél sem'));
}