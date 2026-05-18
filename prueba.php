<!DOCTYPE html>
<html>
<head>
    <title>Editar moto</title>
    <style>
        .foto-item { display: inline-block; margin: 10px; text-align: center; }
        .foto-item img { width: 150px; height: auto; border: 1px solid #ccc; }
        .foto-item label { display: block; margin-top: 5px; }
    </style>
</head>
<body>
    <h2>Editar moto: <?= htmlspecialchars($moto['marca'] . ' ' . $moto['modelo']) ?></h2>
    <form action="actualizar_moto.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        
        <label>Marca: <input type="text" name="marca" value="<?= htmlspecialchars($moto['marca']) ?>" required></label><br>
        <label>Modelo: <input type="text" name="modelo" value="<?= htmlspecialchars($moto['modelo']) ?>" required></label><br><br>

        <h3>Fotos actuales</h3>
        <?php if (empty($fotos)): ?>
            <p>No hay fotos para esta moto.</p>
        <?php else: ?>
            <?php foreach ($fotos as $index => $foto): 
                $nombre_archivo = basename($foto);
            ?>
                <div class="foto-item">
                    <img src="<?= $foto ?>" alt="Foto <?= $nombre_archivo ?>">
                    <label>
                        <input type="checkbox" name="eliminar_fotos[]" value="<?= $nombre_archivo ?>">
                        Eliminar esta foto
                    </label>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>

        <h3>Añadir nuevas fotos</h3>
        <input type="file" name="nuevas_fotos[]" accept="image/*" multiple><br><br>

        <button type="submit">Guardar cambios</button>
        <a href="listar_motos.php">Cancelar</a>
    </form>
</body>
</html>