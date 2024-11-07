<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_evento_maturana";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el id del asistente de la URL
$id = $_GET['id'];

// Consultar los datos del asistente
$sql = "SELECT * FROM asistentes WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Asistente no encontrado.";
    exit;
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarjeta de Asistente</title>
    <link href="css/ver_asistente.css" rel="stylesheet">
</head>
<body>

<div class="tarjeta-card">
    <div class="tarjeta-info">
        <?php
        $campos = [
            'nombre' => 'Asistente',
            'rut' => 'RUT',
            'email' => 'Email',
            'telefono' => 'Teléfono',
            'fecha_registro' => 'Fecha de Registro'
        ];

        foreach ($campos as $campo => $etiqueta) {
            echo '<p><strong>' . $etiqueta . ':</strong> ';
            if (isset($row[$campo]) && !empty($row[$campo])) {
                echo $row[$campo];
            } else {
                echo 'No disponible';
            }
            echo '</p>';
        }
        ?>
    </div>

    <div class="tarjeta-qr">
        <img src="<?php echo !empty($row['codigo_qr']) ? $row['codigo_qr'] : 'http://localhost/programacion-web-evaluacion-2-yelson-maturana/imagenes/qr_por_defecto.png'; ?>" alt="Código QR">
    </div>
</div>

</body>
</html>
