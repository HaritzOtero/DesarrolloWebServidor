<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_actualizar = $_POST['id_actualizar'];
    $nuevo_nombre = $_POST['nuevo_nombre'];
    $nueva_edad = $_POST['nueva_edad'];

    $sql = "UPDATE usuarios SET nombre='$nuevo_nombre', edad=$nueva_edad WHERE id=$id_actualizar";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado con éxito";
    } else {
        echo "Error al actualizar el registro: " . $conn->error;
    }
}

$conn->close();
?>
