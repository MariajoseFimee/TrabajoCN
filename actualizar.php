<?php

    if(isset($_POST["exampleInputNombre"]) && isset($_POST["idvalue"]))
    {
        $nombre = $_POST["exampleInputNombre"];
        $id = $_POST["idvalue"];

        $dbname = "prueba";
        $user = "root";
        $password = "password";

        try {
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        $stmt = $dbh->prepare("UPDATE clientes SET nombre=? WHERE clientes_id=?");
        $stmt->bindParam(1, $nombre);
        $stmt->bindParam(2, $id);

        if($stmt->execute())
        {
            echo $id . " actualizado correctamente a BD";
        }

        $dbh = null;
    }