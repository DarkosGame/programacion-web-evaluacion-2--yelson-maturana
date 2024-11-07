<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_evento_hernandez";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Asistentes</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Lista de Asistentes Registrados</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RUT</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Fecha de Registro</th>
                <th>Ver tarjeta</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM asistentes";
            $result = $conn->query($sql);

            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['rut'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['telefono'] . "</td>";
                    echo "<td>" . $row['fecha_registro'] . "</td>";
                    echo "<td><a href='ver_asistente.php?id=" . $row['id'] . "' class='btn btn-info btn-sm'>Ver tarjeta</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No hay asistentes registrados</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>