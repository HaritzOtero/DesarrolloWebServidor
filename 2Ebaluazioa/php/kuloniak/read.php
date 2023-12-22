<?php
include 'config.php';

$sql = "SELECT * FROM kuloniak";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>ID: " . $row["id"]. " - Izena: " . $row["izena"]. " - Abizena: " . $row["abizena"]. " - Urteak: " . $row["urteak"]. " - Herrialdea: " . $row["herrialdea"]. "</li>";
    }
    echo "</ul>";
} else {
    echo "0 resultados";
}

$conn->close();
?>
