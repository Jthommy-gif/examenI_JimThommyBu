<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('BIBLIOTECA_NOMBRE', ' Biblioteca Digital');

// Inicializar libros de ejemplo
function inicializarLibros() {
    if (!isset($_SESSION['libros'])) {
        $_SESSION['libros'] = [
            [
                'isbn' => '9780451524935',
                'titulo' => '1984',
                'autor' => 'George Orwell',
                'genero' => 'Ficción',
                'año' => 1949,
                'paginas' => 328,
                'disponible' => true,
                'cantidad' => 3
            ],
            [
                'isbn' => '9788408052133',
                'titulo' => 'Cien años de soledad',
                'autor' => 'Gabriel García Márquez',
                'genero' => 'Ficción',
                'año' => 1967,
                'paginas' => 496,
                'disponible' => true,
                'cantidad' => 5
            ],
            [
                'isbn' => '9788437604949',
                'titulo' => 'La colmena',
                'autor' => 'Camilo José Cela',
                'genero' => 'Historia',
                'año' => 1951,
                'paginas' => 365,
                'disponible' => false,
                'cantidad' => 0
            ]
        ];
    }
}

// Mostrar tabla de libros
function mostrarLibros($libros) {
    if (empty($libros)) {
        echo '<tr><td colspan="9" class="sin-resultados">No hay libros para mostrar</td></tr>';
        return;
    }
    
    foreach ($libros as $libro) {
        $clase = $libro['disponible'] ? 'disponible' : 'no-disponible';
        $texto = $libro['disponible'] ? ' Sí' : ' No';
        echo "<tr>";
        echo "<td>{$libro['isbn']}</td>";
        echo "<td>{$libro['titulo']}</td>";
        echo "<td>{$libro['autor']}</td>";
        echo "<td>{$libro['genero']}</td>";
        echo "<td>{$libro['año']}</td>";
        echo "<td>{$libro['paginas']}</td>";
        echo "<td class='$clase'>$texto</td>";
        echo "<td>{$libro['cantidad']}</td>";
        echo "<td><a href='cambiar_disponibilidad.php?isbn={$libro['isbn']}' class='btn-cambiar' onclick='return confirm(\"¿Cambiar disponibilidad?\")'>🔄 Cambiar</a></td>";
        echo "</tr>";
    }
}

// Validar ISBN único
function isbnUnico($isbn) {
    foreach ($_SESSION['libros'] as $libro) {
        if ($libro['isbn'] === $isbn) {
            return false;
        }
    }
    return true;
}

// Obtener géneros únicos
function getGeneros() {
    $generos = [];
    foreach ($_SESSION['libros'] as $libro) {
        if (!in_array($libro['genero'], $generos)) {
            $generos[] = $libro['genero'];
        }
    }
    return $generos;
}
?>