<?php
require_once 'includes/funciones.php';
inicializarLibros();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Libro - <?php echo BIBLIOTECA_NOMBRE; ?></title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo BIBLIOTECA_NOMBRE; ?></h1>
            <p>Registro de Nuevos Libros</p>
        </div>
        
        <div class="content">
            <?php if (isset($_GET['success'])): ?>
                <div class="exito">✅ ¡Libro registrado exitosamente!</div>
            <?php endif; ?>
            
            <form action="procesar_registro.php" method="POST" class="formulario">
                <h2> Datos del Libro</h2>
                
                <div class="campo">
                    <label>ISBN (máx 13 números):</label>
                    <input type="text" name="isbn" maxlength="13" pattern="[0-9]+" required>
                </div>
                
                <div class="campo">
                    <label>Título (mín 5 caracteres):</label>
                    <input type="text" name="titulo" required>
                </div>
                
                <div class="campo">
                    <label>Autor (mín 3 caracteres):</label>
                    <input type="text" name="autor" required>
                </div>
                
                <div class="campo">
                    <label>Género:</label>
                    <select name="genero" required>
                        <option value="">Seleccione...</option>
                        <option value="Ficción">Ficción</option>
                        <option value="No Ficción">No Ficción</option>
                        <option value="Ciencia">Ciencia</option>
                        <option value="Historia">Historia</option>
                        <option value="Romance">Romance</option>
                        <option value="Fantasía">Fantasía</option>
                    </select>
                </div>
                
                <div class="campo">
                    <label>Año (1900-2024):</label>
                    <input type="number" name="año" min="1900" max="2024" required>
                </div>
                
                <div class="campo">
                    <label>Páginas (1-5000):</label>
                    <input type="number" name="paginas" min="1" max="5000" required>
                </div>
                
                <div class="campo campo-checkbox">
                    <label>¿Disponible?</label>
                    <input type="checkbox" name="disponible" value="1">
                </div>
                
                <div class="campo">
                    <label>Cantidad (mín 1):</label>
                    <input type="number" name="cantidad" min="1" required>
                </div>
                
                <div style="display: flex; gap: 10px; margin-top: 20px;">
                    <button type="submit" class="btn-submit">📚 Registrar Libro</button>
                    <a href="index.php" class="btn-submit" style="background: #95a5a6; text-decoration: none;">← Volver al Inicio</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
