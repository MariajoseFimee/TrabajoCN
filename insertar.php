<?php

    if(isset($_POST["exampleInputNombre"]))
    {
        $nombre = $_POST["exampleInputNombre"];

        $dbname = "prueba";
        $user = "root";
        $password = "password";

        try {
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        $stmt = $dbh->prepare("INSERT INTO clientes(nombre) VALUES(?)");
        $stmt->bindParam(1, $nombre);

        if($stmt->execute())
        {
            echo $nombre . " agregado correctamente a BD";
        }

        $dbh = null;
    }