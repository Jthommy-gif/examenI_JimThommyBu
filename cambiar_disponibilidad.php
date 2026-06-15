<?php
session_start();
require_once 'includes/funciones.php';

if (isset($_GET['isbn'])) {
    foreach ($_SESSION['libros'] as $key => $libro) {
        if ($libro['isbn'] === $_GET['isbn']) {
            // Cambiar estado usando operador ternario
            $_SESSION['libros'][$key]['disponible'] = $libro['disponible'] ? false : true;
            break;
        }
    }
}

header('Location: index.php');
?>
