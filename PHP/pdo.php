<?php

$user = "tidal";
$passwd = "tidal";
$dsn = "pgsql:host=localhost;port=5432;dbname=acudb;";

try {
    $conn = new PDO($dsn,$user, $passwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION)
    $sql = "INSERT INTO user (test)
    VALUES ('test')";
    $conn->exec($sql);
    echo "ça marche";
}
catch(PDOException $e){
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>