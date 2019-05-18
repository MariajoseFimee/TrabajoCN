<?php

    if(isset($_POST["id"]))
    {
        $id = $_POST["id"];

        $dbname = "prueba";
        $user = "root";
        $password = "password";

        try {
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        $stmt = $dbh->prepare("DELETE FROM clientes WHERE clientes_id=?");
        $stmt->bindParam(1, $id);

        if($stmt->execute())
        {
            echo $id . " ID eliminado correctamente de BD";
        }

        $dbh = null;
    }
    else{
        header("Location:index.php");
    }
?>