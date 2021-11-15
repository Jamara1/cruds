<?php
require "config.php";
require "conn.php";

$dbConn = connect($db);

// Crear un nuevo usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST) {
        $input = $_POST;
        $sql = "INSERT INTO tb_users
        (document, name, email, psw, date)
        VALUES
        (:document, :name, :email, :psw, current_timestamp())";
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
