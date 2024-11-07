<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Asistentes</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

<div class="form-container">
    <h4 class="form-title"><i class="fas fa-user-plus"></i> Registro de Asistentes</h4>
    <form action="registro.php" method="POST" enctype="multipart/form-data">
        
        <div class="input-group">
            <label for="nombre">Nombre Completo</label>
            <input type="text" class="input-field" id="nombre" name="nombre" required placeholder="Nombre Completo">
        </div>

        <div class="input-group">
            <label for="rut">RUT</label>
            <input type="text" class="input-field" id="rut" name="rut" required placeholder="RUT">
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" class="input-field" id="email" name="email" required placeholder="Email">
        </div>

        <div class="input-group">
            <label for="telefono">Teléfono</label>
            <input type="text" class="input-field" id="telefono" name="telefono" required placeholder="Teléfono">
        </div>

        <div class="input-group">
            <label for="imagen">Foto de Perfil</label>
            <input type="file" class="input-file" id="imagen" name="imagen" required>
        </div>

        <button type="submit" class="submit-btn">Registrar Asistente</button>
    </form>
</div>
</body>
</html>
