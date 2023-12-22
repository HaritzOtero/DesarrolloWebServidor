<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['izena'];
    $apellido = $_POST['abizena'];
    $edad = $_POST['urteak'];

    $pais = $_POST['herrialdea'];

    $sql = "INSERT INTO kuloniak (izena,abizena,urteak,herrialdea) VALUES ('$nombre', $apellido, '$edad','$pais')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro creado con éxito";
    } else {
        echo "Error al crear el registro: " . $conn->error;
    }
}

$conn->close();
?>
