<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="index.php">inicio</a><br/>

    <form method="Post" action="#">
        Ingrese Numero a registrar:<br/>
        <input name="numero" type="number"><br/>
        <input name="send" type="submit" value="Registrar">
    </form>



    <?php

        include_once "connectDB.php";

        function registrar($numero)
        {
            try {
                $db = new ConexionDB();
                $conn = $db->abrirConexion();
                $sql = "INSERT INTO numeros(numeros) VALUES(?)";
                $respuesta = $conn->prepare($sql);
                $respuesta->execute([$numero]);
                $numRows = $respuesta->rowCount();
                if($numRows!=0) {
                    $estado = true;
                }else {
                    $estado = false;
                }

                $db->cerrarConexion();

                return $estado;
            }
            catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

        if (isset($_POST["send"])) {

            $numero = $_POST["numero"];
        
           
            if (registrar($numero)) {
                echo "Numero Registrado correctamente";
            } else {
                echo "Error: Los datos no se guardaron, o el numero ya existe!!";
            }
        
        }
        
        
    ?>
</body>
</html>