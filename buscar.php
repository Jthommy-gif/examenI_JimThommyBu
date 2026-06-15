<?php
require_once 'includes/funciones.php';
inicializarLibros();

$resultados = $_SESSION['libros'];
$aplicarFiltro = false;

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    $aplicarFiltro = true;
    
    // Búsqueda por título
    if (!empty($_GET['buscar'])) {
        $busqueda = strtolower(trim($_GET['buscar']));
        $temp = [];
        foreach ($resultados as $libro) {
            if (strpos(strtolower($libro['titulo']), $busqueda) !== false) {
                $temp[] = $libro;
            }
        }
        $resultados = $temp;
    }
    
    // Filtro por género
    if (!empty($_GET['genero']) && $_GET['genero'] !== 'todos') {
        $temp = [];
        foreach ($resultados as $libro) {
            if ($libro['genero'] === $_GET['genero']) {
                $temp[] = $libro;
            }
        }
        $resultados = $temp;
    }
    
    // Filtro por disponibilidad
    if (isset($_GET['disponibilidad']) && $_GET['disponibilidad'] !== 'todos') {
        $temp = [];
        $estado = $_GET['disponibilidad'] === 'disponibles';
        foreach ($resultados as $libro) {
            if ($libro['disponible'] === $estado) {
                $temp[] = $libro;
            }
        }
        $resultados = $temp;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Libros - <?php echo BIBLIOTECA_NOMBRE; ?></title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><?php echo BIBLIOTECA_NOMBRE; ?></h1>
            <p>Búsqueda y Filtrado</p>
        </div>
        
        <div class="content">
            <h2>🔍 Buscar y Filtrar Libros</h2>
            
            <div class="filtros">
                <form method="GET">
                    <div class="grupo-filtro">
                        <h3> Búsqueda por título</h3>
                        <input type="text" name="buscar" placeholder="Escriba parte del título..." 
                               value="<?php echo $_GET['buscar'] ?? ''; ?>" style="width:100%; padding:10px;">
                    </div>
                    
                    <div class="grupo-filtro">
                        <h3> Filtrar por género</h3>
                        <select name="genero" style="width:100%; padding:10px;">
                            <option value="todos">Todos los géneros</option>
                            <?php foreach (getGeneros() as $g): ?>
                                <option value="<?php echo $g; ?>" 
                                    <?php echo (($_GET['genero'] ?? '') === $g) ? 'selected' : ''; ?>>
                                    <?php echo $g; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="grupo-filtro">
                        <h3> Disponibilidad</h3>
                        <label><input type="radio" name="disponibilidad" value="todos" 
                            <?php echo (($_GET['disponibilidad'] ?? 'todos') === 'todos') ? 'checked' : ''; ?>> Todos</label><br>
                        <label><input type="radio" name="disponibilidad" value="disponibles"
                            <?php echo (($_GET['disponibilidad'] ?? '') === 'disponibles') ? 'checked' : ''; ?>> Solo disponibles</label><br>
                        <label><input type="radio" name="disponibilidad" value="nodisponibles"
                            <?php echo (($_GET['disponibilidad'] ?? '') === 'nodisponibles') ? 'checked' : ''; ?>> Solo no disponibles</label>
                    </div>
                    
                    <button type="submit" class="btn-submit">🔍 Aplicar filtros</button>
                    <a href="buscar.php" class="btn-submit" style="background:#95a5a6;">🗑️ Limpiar</a>
                    <a href="index.php" class="btn-submit" style="background: #3498db;">← Volver al Inicio</a>
                </form>
            </div>
            
            <?php if ($aplicarFiltro): ?>
                <h3>Resultados: <?php echo count($resultados); ?> libro(s)</h3>
                <?php if (empty($resultados)): ?>
                    <div class="error">No se encontraron libros</div>
                <?php else: ?>
                    <table>
                        <thead><tr><th>ISBN</th><th>Título</th><th>Autor</th><th>Género</th><th>Año</th><th>Páginas</th><th>Disponible</th><th>Cantidad</th></tr></thead>
                        <tbody><?php mostrarLibros($resultados); ?></tbody>
                    </table>
                <?php endif; ?>
            <?php else: ?>
                <div class="exito">Use los filtros para buscar libros</div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
