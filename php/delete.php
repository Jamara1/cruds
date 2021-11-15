<?php
require "config.php";
require "conn.php";


$dbConn =  connect($db);

// Eliminar un usuario
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    if ($_GET) {
        $input = $_GET;
        $sql = "DELETE FROM tb_users WHERE document=:document";
        $statement = $dbConn->prepare($sql);
        bindAllValues($statement, $input);
        $statement->execute();
        header("HTTP/1.1 200 OK");
        echo "success";
        exit();
    } else {
        echo "error";
    }
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
