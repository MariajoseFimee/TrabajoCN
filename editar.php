<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Cómputo en la nube</title>
  </head>
  <body>
    <?php
  if(isset($_GET["nombre"]) && $_GET["id"])
    {
        $nombre = $_GET["nombre"];
        $id = $_GET["id"];

        $dbname = "prueba";
        $user = "root";
        $password = "password";

        try {
            $dsn = "mysql:host=localhost;dbname=$dbname";
            $dbh = new PDO($dsn, $user, $password);
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        /*$stmt = $dbh->prepare("INSERT INTO Clientes(nombre) VALUES(?)");
        $stmt->bindParam(1, $nombre);

        if($stmt->execute())
        {
            echo $nombre . " agregado correctamente a BD";
        }

        $dbh = null;*/
    }
    else{
        header("Location:index.php");
    }
?>
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
        <h1>Editar valor a BD</h1>
        <form method="POST" id="editarnombre">
        <div class="form-group">
            <label for="exampleInputNombre">Nombre</label>
            <input type="text" class="form-control" id="exampleInputNombre" name="exampleInputNombre" value="<?php echo $nombre; ?>" required>
            <input type="hidden" class="form-control" id="idvalue" name="idvalue" value="<?php echo $id; ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <p id="respuesta"></p>
        </form>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="index.js"></script>
  </body>
</html>