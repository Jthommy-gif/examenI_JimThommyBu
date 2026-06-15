<?php
require_once 'includes/funciones.php';
inicializarLibros();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo BIBLIOTECA_NOMBRE; ?></title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo BIBLIOTECA_NOMBRE; ?></h1>
            <p>Sistema de Gestión Digital</p>
        </div>
        
        <nav class="nav">
            <a href="registrar.php"> Registrar Libro</a>
            <a href="buscar.php"> Buscar/Filtrar</a>
            <a href="estadisticas.php"> Estadísticas</a>
        </nav>
        
        <div class="content">
            <h2> Catálogo de Libros</h2>
            <p>Total: <strong><?php echo count($_SESSION['libros']); ?></strong> libros</p>
            
            <table>
                <thead>
                    <tr>
                        <th>ISBN</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Género</th>
                        <th>Año</th>
                        <th>Páginas</th>
                        <th>Disponible</th>
                        <th>Cantidad</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php mostrarLibros($_SESSION['libros']); ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_GET['salir'])) {
    session_destroy();
    header('Location: index.php');
}
?>
