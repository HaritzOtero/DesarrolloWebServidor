<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP</title>
</head>
<body>
    <h2>Lista de Kulonias</h2>

    <?php
    include 'read.php';
    ?>

    <h2>Agregar Usuario</h2>
    <form action="create.php" method="post">
        <label for="izena">Izena:</label>
        <input type="text" name="izena" required>
        <label for="abizena">Abizena:</label>
        <input type="text" name="abizena" required>
        <label for="urteak">Urteak:</label>
        <input type="number" name="urteak" required>
        <label for="herrialdea">Herrialdea::</label>
        <input type="text" name="herrialdea" required>
        <button type="submit">Agregar</button>
    </form>

    <h2>Actualizar Usuario</h2>
    <form action="update.php" method="post">
        <label for="id_actualizar">Aldatzeko ID-a:</label>
        <input type="number" name="id_actualizar" required>
        <label for="nuevo_nombre">Izen berria:</label>
        <input type="text" name="nuevo_nombre" required>
        <label for="nuevo_nombre">Abizen berria:</label>
        <input type="text" name="nuevo_nombre" required>
        <label for="nueva_edad">Adin berria:</label>
        <input type="number" name="nueva_edad" required>
        <label for="nevo_pais">Adin berria:</label>
        <input type="number" name="nuevo_pais" required>
        <button type="submit">Actualizar</button>
    </form>

    <h2>Eliminar Usuario</h2>
    <form action="delete.php" method="post">
        <label for="id_eliminar">Ezabatzeko ID-a</label>
        <input type="number" name="id_eliminar" required>
        <button type="submit">Eliminar</button>
    </form>
</body>
</html>
