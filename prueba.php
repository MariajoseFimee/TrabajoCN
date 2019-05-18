<?php

    //print_r(PDO::getAvailableDrivers());

    $dbname = "prueba";
    $user = "root";
    $password = "password";

    try {
        $dsn = "mysql:host=localhost;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e){
        echo $e->getMessage();
    }

   /* $stmt = $dbh->prepare("INSERT INTO Clientes(nombre) VALUES(?)");
    $nombre = "Yair";
    $stmt->bindParam(1, $nombre);

    $stmt->execute();*/

    /*$nombre = "Alejandro";
    $stmt->bindParam(1, $nombre);

    $stmt->execute();

    $stmt = $dbh->prepare("INSERT INTO Clientes(nombre) VALUES(:nombre)");
    $nombre = "Nombre de Prueba";
    $stmt->bindParam(':nombre', $nombre);

    $stmt->execute();
    echo "ID: " . $dbh->lastInsertId();

    class Cliente
    {
        public $nombre;
        public function __construct($nombre)
        {
            $this->nombre = $nombre;
        }
    }

    $cliente = new Cliente("Yair Alejandro");
    $stmt = $dbh->prepare("INSERT INTO clientes(nombre) VALUES(:nombre)");
    $stmt->execute((array) $cliente );*/

    $stmt = $dbh->prepare("SELECT * FROM clientes");
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    echo "<br> FETCH_ASSOC <br>";
    while($row = $stmt->fetch())
    {
        echo "Nombre: {$row["nombre"]} <br>";
    }

  /*  $stmt = $dbh->prepare("SELECT * FROM clientes");
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    echo "<br> FETCH_OBJ <br>";
    while($row = $stmt->fetch())
    {
        echo "Nombre: " . $row->nombre . "<br>";
    }

    try
    {
        $dbh->beginTransaction();
        $dbh->query("INSERT INTO clientes(nombre) VALUES('aaaa')");
        $dbh->query("INSERT INTO clientes(nombre) VALUES('bbbb')");
        $dbh->commit();
    }
    catch(Exception $e)
    {
        $dbh->rollback();
    }

    $dbh = null;*/