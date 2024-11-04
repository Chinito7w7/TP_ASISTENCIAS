<?php
// Leer archivo Alumnos.txt
$alumnos = [];
$file = fopen("Archivos/Alumnos.txt", "r");
while ($line = fgets($file)) {
    $data = explode("|", trim($line));
    $alumnos[] = ['matricula' => $data[0], 'nombre' => $data[1], 'apellido' => $data[2]];
}
fclose($file);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tomar Asistencia</title>
</head>
<body>
    <form action="php/GeneraArchivo.php" method="POST">
        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" required>
        <h3>Lista de Alumnos</h3>
        <ul>
            <?php foreach ($alumnos as $alumno): ?>
                <li>
                    <?php echo "{$alumno['nombre']} {$alumno['apellido']} ({$alumno['matricula']})"; ?>
                    <label>
                        <input type="radio" name="asistencia[<?php echo $alumno['matricula']; ?>]" value="P" required> Presente
                    </label>
                    <label>
                        <input type="radio" name="asistencia[<?php echo $alumno['matricula']; ?>]" value="A"> Ausente
                    </label>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="submit">Guardar Asistencia</button>
    </form>
</body>
</html>
