<?php
require "config.php";
require "conn.php";

$dbConn =  connect($db);

/*
  Logueo del usuario
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($_GET) {
        $input = $_GET;
        $sql = "SELECT * FROM tb_users WHERE document=:document AND psw=:psw";
        $statement = $dbConn->prepare($sql);
        bindAllValues($statement, $input);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            header("HTTP/1.1 200 OK");
            echo "success";
        } else {
            echo "error";
        }
        exit();
    } else {
        echo "error";
    }
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");
