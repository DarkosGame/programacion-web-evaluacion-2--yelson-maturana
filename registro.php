<?php

require 'phpqrcode/qrlib.php';


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registro_evento_maturana";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $rut = $_POST['rut'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    
    $img = $_FILES['imagen'];
    $rutaImg = 'imagenes/' . basename($img['name']);
    move_uploaded_file($img['tmp_name'], $rutaImg);

    
    $sql = "INSERT INTO asistentes (nombre, rut, email, telefono, imagen) VALUES ('$nombre', '$rut', '$email', '$telefono', '$rutaImg')";
    
    if ($conn->query($sql) === TRUE) {
        $id = $conn->insert_id;
        
        
        $dir = 'imagenes/';
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        
        $filename = $dir . 'qr_' . $id . '.png';
        $contenido = 'http://localhost/programacion-web-evaluacion-2-yelson-maturana/ver_asistente.php?id=' . $id; // URL para ver la tarjeta del asistente
        $tamanio = 10;
        $level = 'M';
        $frameSize = 3;
        
        
        QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

        
        $url_qr = "http://localhost/programacion-web-evaluacion-2-yelson-maturana/imagenes/qr_$id.png";
        $conn->query("UPDATE asistentes SET codigo_qr='$url_qr' WHERE id='$id'");

        echo "
        <link rel='stylesheet' href='css/index.css'>
        <div class='alert alert-success'>Registro exitoso. 
            <a href='ver_asistente.php?id=$id'>Ver tarjeta virtual</a>
        </div>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>