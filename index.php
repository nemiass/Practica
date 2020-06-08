<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="registro.php">Registrar Nuevo Numero</a>
    <table border=1>
            <?php

            include_once "connectDB.php";
            function traerNumeros()
            {
                $db = new ConexionDB();
                $conn = $db->abrirConexion();
                $sql = "SELECT * FROM numeros";
                $respuesta = $conn->prepare($sql);
                $respuesta->execute();
                $datos = $respuesta->fetchAll();

                return $datos;
            }

            $numeros = traerNumeros();

        
            echo "<tr>";
            $datos = [];
            $cont = 0;
            for($i=0; $i<=669; $i++) {
                foreach ($numeros as $numero){
                    if ($numero[1]==$i){
                        echo "<td style='background:yellow;'>".$i."</td>";
                        $i++;
                        $cont+=1;
                    }
                }
                if ($cont>20) {
                    $cont=0;
                    echo "</tr>";
                    echo "<tr>";
                }
                $cont+=1;
                echo "<td id='$i'>".$i."</td>";
            }    
            ?>
    </table>
</body>
</html>