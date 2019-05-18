<?php
 
    $dbname = "prueba";
    $user = "root";
    $password = "password";

    try {
        $dsn = "mysql:host=localhost;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e){
        echo $e->getMessage();
    }

    $data = $dbh->query("select clientes_id, nombre from clientes")->fetchAll(PDO::FETCH_ASSOC);
    
    echo json_encode($data);

    $dbh = null;    