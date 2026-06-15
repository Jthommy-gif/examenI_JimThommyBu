<?php
require_once 'includes/funciones.php';
inicializarLibros();

$libros = $_SESSION['libros'];
$total = count($libros);

// Calcular estadísticas
$disponibles = 0;
$totalPaginas = 0;
$totalCantidad = 0;
$años = [];
$generos = [];

foreach ($libros as $libro) {
    if ($libro['disponible']) $disponibles++;
    $totalPaginas += $libro['paginas'];
    $totalCantidad += $libro['cantidad'];
    $años[] = $libro['año'];
    
    if (!isset($generos[$libro['genero']])) $generos[$libro['genero']] = 0;
    $generos[$libro['genero']]++;
}

$noDisponibles = $total - $disponibles;
$porcentaje = $total > 0 ? ($disponibles / $total) * 100 : 0;
$masAntiguo = !empty($años) ? min($años) : 'N/A';
$masReciente = !empty($años) ? max($años) : 'N/A';
$generoPopular = !empty($generos) ? array_search(max($generos), $generos) : 'Ninguno';
$promedioPaginas = $total > 0 ? $totalPaginas / $total : 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas - <?php echo BIBLIOTECA_NOMBRE; ?></title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo BIBLIOTECA_NOMBRE; ?></h1>
            <p>Estadísticas del Sistema</p>
        </div>
        
        <div class="content">
            <h2> Estadísticas del Sistema</h2>
            
            <?php if ($total == 0): ?>
                <div class="aviso" style="background: #fef9e6; border-left: 4px solid #f39c12; padding: 15px; margin: 20px 0; border-radius: 5px;">
                    ⚠️ No hay libros registrados aún. 
                    <a href="registrar.php" style="color: #3498db; text-decoration: none;">📝 Registra uno aquí</a>
                </div>
            <?php else: ?>
                <div class="stats-grid">
                    <div class="stat-card"><h3> Total libros</h3><div class="valor"><?php echo $total; ?></div></div>
                    <div class="stat-card"><h3> Disponibles</h3><div class="valor"><?php echo $disponibles; ?></div></div>
                    <div class="stat-card"><h3> No disponibles</h3><div class="valor"><?php echo $noDisponibles; ?></div></div>
                    <div class="stat-card"><h3> % Disponibilidad</h3><div class="valor"><?php echo round($porcentaje, 2); ?>%</div></div>
                    <div class="stat-card"><h3> Libro más antiguo</h3><div class="valor"><?php echo $masAntiguo; ?></div></div>
                    <div class="stat-card"><h3> Libro más reciente</h3><div class="valor"><?php echo $masReciente; ?></div></div>
                    <div class="stat-card"><h3> Género más popular</h3><div class="valor"><?php echo $generoPopular; ?></div></div>
                    <div class="stat-card"><h3> Total páginas</h3><div class="valor"><?php echo number_format($totalPaginas); ?></div></div>
                    <div class="stat-card"><h3> Promedio páginas</h3><div class="valor"><?php echo round($promedioPaginas, 1); ?></div></div>
                    <div class="stat-card"><h3> Inventario total</h3><div class="valor"><?php echo $totalCantidad; ?></div></div>
                </div>
            <?php endif; ?>
            
            <div style="margin-top: 30px; text-align: center;">
                <a href="index.php" class="btn-submit" style="background: #3498db; text-decoration: none;">← Volver al Inicio</a>
            </div>
        </div>
    </div>
</body>
</html>
