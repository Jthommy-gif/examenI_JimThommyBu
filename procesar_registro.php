<?php
session_start();
require_once 'includes/funciones.php';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registrar.php');
    exit;
}

// Recibir datos
$isbn = trim($_POST['isbn'] ?? '');
$titulo = trim($_POST['titulo'] ?? '');
$autor = trim($_POST['autor'] ?? '');
$genero = $_POST['genero'] ?? '';
$año = $_POST['año'] ?? '';
$paginas = $_POST['paginas'] ?? '';
$disponible = isset($_POST['disponible']);
$cantidad = $_POST['cantidad'] ?? '';

// Validaciones
if (empty($isbn)) $errores[] = "ISBN es obligatorio";
elseif (!ctype_digit($isbn)) $errores[] = "ISBN solo números";
elseif (strlen($isbn) > 13) $errores[] = "ISBN máximo 13 caracteres";
elseif (!isbnUnico($isbn)) $errores[] = "ISBN ya existe";

if (empty($titulo)) $errores[] = "Título obligatorio";
elseif (strlen($titulo) < 5) $errores[] = "Título mínimo 5 caracteres";

if (empty($autor)) $errores[] = "Autor obligatorio";
elseif (strlen($autor) < 3) $errores[] = "Autor mínimo 3 caracteres";

if (empty($año)) $errores[] = "Año obligatorio";
elseif ($año < 1900 || $año > 2024) $errores[] = "Año entre 1900-2024";

if (empty($paginas)) $errores[] = "Páginas obligatorio";
elseif ($paginas < 1 || $paginas > 5000) $errores[] = "Páginas entre 1-5000";

if (empty($cantidad)) $errores[] = "Cantidad obligatoria";
elseif ($cantidad < 1) $errores[] = "Cantidad mínimo 1";

// Mostrar errores o guardar
if (!empty($errores)) {
    echo "<div class='container'><div class='content'>";
    echo "<h2> Errores</h2><div class='error'>";
    foreach ($errores as $error) echo "<p>• $error</p>";
    echo "</div><a href='registrar.php' class='btn-submit'>← Volver</a>";
    echo "</div></div>";
    exit;
}

// Guardar libro
$_SESSION['libros'][] = [
    'isbn' => $isbn,
    'titulo' => htmlspecialchars($titulo),
    'autor' => htmlspecialchars($autor),
    'genero' => $genero,
    'año' => (int)$año,
    'paginas' => (int)$paginas,
    'disponible' => $disponible,
    'cantidad' => (int)$cantidad
];

header('Location: registrar.php?success=1');
?>
