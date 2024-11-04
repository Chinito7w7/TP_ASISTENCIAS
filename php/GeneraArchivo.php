<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha = $_POST['fecha'];
    $asistencia = $_POST['asistencia'];
    
    if (empty($fecha)) {
        die("El campo de fecha es obligatorio.");
    }
    
    // Formato de archivo: YYYY-MM-DD.txt
    $fileName = "../Archivos/{$fecha}.txt";
    $file = fopen($fileName, "w");
    
    foreach ($asistencia as $matricula => $status) {
        fwrite($file, "{$matricula}|{$status}\n");
    }
    
    fclose($file);
    echo "Archivo de asistencia generado exitosamente para la fecha {$fecha}.";
}
?>
