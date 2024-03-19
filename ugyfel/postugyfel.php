<?php
<<<<<<< HEAD
//echo 'POST';
//$azon=$_POST["azon"];
$nev=$_POST["nev"];	
$szulev =$_POST["szulev"];
$irszam=$_POST["irszam"];	
$orsz=$_POST["orsz"];
//$azon=2002;
//$nev="Géza";	
//$szulev =2005;
//$irszam=4030;	
//$orsz="H";
require_once './databaseconnect.php';
$sql = "INSERT INTO ugyfel (azon, nev, szulev, irszam, orsz) VALUES (NULL, ?, ?, ?, ?)";
$stmt = $connection->prepare($sql);
$stmt->bind_param("siis",  $nev, $szulev, $irszam, $orsz);  
if ($stmt->execute()) {
    http_response_code(201);
    echo 'Sikeresen hozzáadva';
} else {
    http_response_code(404);
    echo 'Nem sikerült hozzáadni';
}

=======
// Összes ügyfél adatai JSON
$sql = '';
if(count($kereSzoveg) > 1){
    if(is_int(intval($kereSzoveg[1]))){
        $sql = "INSERT INTO `ugyfel` (azon, nev, szulev, irszam, orsz)VALUES(?, ?, ?, ?, ?, ?)" . $kereSzoveg[1];
    }else{
        http_response_code(404);
        echo 'Nem létező ügyfél.';
    }
}else{
    $sql = "INSERT INTO `ugyfel` (azon, nev, szulev, irszam, orsz)VALUES(?, ?, ?, ?, ?, ?)";
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
}
>>>>>>> e42d6566b7b2135a62522ecc08070be7d730edda
