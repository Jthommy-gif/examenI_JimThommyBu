# 📚 Sistema de Gestión de Biblioteca Digital

## 📋 Información del Estudiante

| Campo | Información |
|-------|-------------|
| **Nombre completo** | Jim Thommy Beutelschies U. |
| **Carrera** | Ing. en sistemas computacionales |
| **Materia** | Programación Web IV|
| **Fecha** | 15/6/2026 |

---

## 🚀 Cómo ejecutar el sistema

### Requisitos previos
- Tener instalado **XAMPP** (Apache y PHP)
- PHP versión 7.4 o superior

### Pasos para la instalación

1. **Iniciar XAMPP**
- Abrir el XAMPP Control Panel
- Hacer clic en "Start" en el módulo de **Apache**
- Verificar que aparezca en verde: "Running"

2. **Acceder al sistema**
- Abrir cualquier navegador web (Chrome, Firefox, Edge)
- Escribir en la barra de direcciones:
http://localhost/EXAMEN_APELLIDO_NOMBRE/

text
(Reemplazar "EXAMEN_APELLIDO_NOMBRE" por el nombre real de tu carpeta)

4. **Navegar por el sistema**
- Usar el menú principal para acceder a las diferentes secciones
- Los datos persisten mientras la sesión esté activa

---

## 📁 Estructura del proyecto
EXAMEN_APELLIDO_NOMBRE/
│
├── index.php # Página principal (Dashboard)
├── registrar.php # Formulario de registro de libros
├── procesar_registro.php # Procesa y valida el registro
├── buscar.php # Búsqueda y filtrado de libros
├── estadisticas.php # Estadísticas del sistema
├── cambiar_disponibilidad.php # Cambia estado de disponibilidad
│
├── css/
│ └── estilos.css # Hoja de estilos principal
│
├── includes/
│ └── funciones.php # Funciones reutilizables
│
└── README.md # Este archivo

text

---

## 🎯 Características implementadas

### ✅ 1. Página Principal - Dashboard (15 pts)
- [x] Título de la biblioteca con diseño atractivo
- [x] Menú de navegación completo (Inicio, Registrar, Buscar, Estadísticas, Salir)
- [x] Tabla con todos los libros almacenados
- [x] Datos de ejemplo precargados (3 libros iniciales)
- [x] Diseño responsive con CSS personalizado

### ✅ 2. Registro de Libros (25 pts)
- [x] Formulario POST con todos los campos requeridos:
  - ISBN (máx 13 caracteres, solo números)
  - Título (mín 5 caracteres)
  - Autor (mín 3 caracteres)
  - Género (select con 6 opciones)
  - Año (1900-2024)
  - Número de páginas (1-5000)
  - Disponible (checkbox)
  - Cantidad en inventario (mín 1)
- [x] Validaciones completas:
  - Todos los campos obligatorios
  - ISBN único (no se pueden repetir)
  - Longitud mínima de cadenas
  - Formatos numéricos validados
- [x] Mensajes de error específicos
- [x] Sanitización con `htmlspecialchars()`
- [x] Confirmación y limpieza después de registro exitoso

### ✅ 3. Almacenamiento de Datos (20 pts)
- [x] Uso de `$_SESSION` para almacenar libros
- [x] Arreglo multidimensional asociativo
- [x] Persistencia de datos durante la sesión
- [x] 3 libros de ejemplo preconfigurados:
  - "1984" - George Orwell (Ficción)
  - "Cien años de soledad" - Gabriel García Márquez (Ficción)
  - "La colmena" - Camilo José Cela (Historia)

### ✅ 4. Búsqueda y Filtrado (20 pts)
- [x] Formulario GET con 3 tipos de filtros:
  - **Búsqueda por título**: Insensible a mayúsculas/minúsculas
  - **Filtro por género**: Select con todos los géneros disponibles
  - **Filtro por disponibilidad**: Radio buttons (Todos/Disponibles/No disponibles)
- [x] Uso de `$_GET` para recibir parámetros
- [x] `foreach` para recorrer arreglo de libros
- [x] Lógica condicional (if-else, switch implícito)
- [x] `strlen()` y `count()` para validaciones
- [x] Mensaje "No hay resultados" cuando corresponde
- [x] Conteo de resultados encontrados

### ✅ 5. Estadísticas del Sistema (15 pts)
- [x] Total de libros en biblioteca (`count()`)
- [x] Total de disponibles vs no disponibles
- [x] Porcentaje de disponibilidad (cálculo matemático)
- [x] Libro más antiguo (mín año)
- [x] Libro más reciente (máx año)
- [x] Género más popular (mayor cantidad)
- [x] Cantidad total de páginas
- [x] Promedio de páginas por libro
- [x] Inventario total (suma de cantidades)

### ✅ 6. Edición de Disponibilidad (10 pts)
- [x] Botón "Cambiar disponibilidad" en cada fila
- [x] Cambio de estado (true↔false) usando operador ternario
- [x] Confirmación con JavaScript
- [x] Actualización inmediata de la tabla

---

## 🛠️ Requisitos técnicos cumplidos

| Requisito | Estado | Ubicación |
|-----------|--------|-----------|
| Variables de múltiples tipos | ✅ | `funciones.php` |
| Constantes (define) | ✅ | `funciones.php` (BIBLIOTECA_NOMBRE) |
| Operadores aritméticos | ✅ | `estadisticas.php` |
| Operadores de comparación y lógicos | ✅ | `procesar_registro.php` |
| Estructuras condicionales (if-else, if-elseif) | ✅ | `buscar.php`, `procesar_registro.php` |
| Bucles (for, foreach, while) | ✅ | `estadisticas.php`, `buscar.php` |
| Arreglos indexados, asociativos y multidimensionales | ✅ | `$_SESSION['libros']` |
| Funciones personalizadas (mínimo 3) | ✅ | `inicializarLibros()`, `mostrarLibros()`, `isbnUnico()`, `getGeneros()` |
| Formularios GET y POST | ✅ | `buscar.php` (GET), `registrar.php` (POST) |
| Validación con isset(), empty(), strlen() | ✅ | `procesar_registro.php` |
| Sanitización con htmlspecialchars() | ✅ | `procesar_registro.php` |
| Casting de tipos | ✅ | `procesar_registro.php` |
| Funciones de arreglos (count(), array_push()) | ✅ | `estadisticas.php`, `funciones.php` |
| Operador ternario | ✅ | `cambiar_disponibilidad.php` |
| Sesiones ($_SESSION) | ✅ | Todos los archivos |
| CSS personalizado (mínimo 20 reglas) | ✅ | `estilos.css` (más de 50 reglas) |

---

## 🎨 Características del diseño CSS

- **Diseño atractivo** con gradientes y sombras
- **Responsive** (se adapta a móviles y tablets)
- **Tarjetas de estadísticas** con efectos hover
- **Tablas estilizadas** con filas alternadas
- **Botones** con efectos de transición
- **Mensajes de error y éxito** con colores distintivos
- **Animaciones** de entrada (fadeIn)

---

## 🔄 Flujo de trabajo del sistema
Usuario ingresa al index.php
↓

Visualiza todos los libros en tabla
↓

Puede:

Registrar nuevo libro (formulario)

Buscar/Filtrar libros

Ver estadísticas

Cambiar disponibilidad de un libro

Cerrar sesión (destruir datos)

text

---

## 📝 Validaciones implementadas

### Registro de libros:
- ✅ ISBN: Solo números, máximo 13 caracteres, único
- ✅ Título: Mínimo 5 caracteres
- ✅ Autor: Mínimo 3 caracteres
- ✅ Año: Entre 1900 y 2024
- ✅ Páginas: Entre 1 y 5000
- ✅ Cantidad: Mínimo 1

### Mensajes de error:
- Específicos para cada campo
- Se muestran en pantalla sin recargar la lógica
- Diseño visual diferenciado (rojo para errores, verde para éxito)

---

## 🧪 Pruebas recomendadas

1. **Registrar un libro nuevo** y verificar que aparezca en la tabla
2. **Intentar registrar ISBN duplicado** (debe mostrar error)
3. **Buscar por título** "cien" (debe encontrar "Cien años de soledad")
4. **Filtrar por género** "Historia" (debe mostrar solo "La colmena")
5. **Filtrar solo disponibles** (debe mostrar 2 libros)
6. **Cambiar disponibilidad** de un libro y verificar cambio
7. **Ver estadísticas** después de registrar nuevos libros

---

## 🐛 Solución de problemas comunes

| Problema | Solución |
|----------|----------|
| Pantalla en blanco | Verificar que Apache esté corriendo en XAMPP |
| Error de sesión | Asegurar que `session_start()` está al inicio |
| No se ven los estilos | Verificar ruta del CSS: `css/estilos.css` |
| ISBN duplicado no detectado | Revisar función `isbnUnico()` |
| Los datos no persisten | No cerrar el navegador (son datos de sesión) |

---

## 📊 Ejemplo de datos precargados

| ISBN | Título | Autor | Género | Año | Páginas | Disponible | Cantidad |
|------|--------|-------|--------|-----|---------|------------|----------|
| 9780451524935 | 1984 | George Orwell | Ficción | 1949 | 328 | ✅ Sí | 3 |
| 9788408052133 | Cien años de soledad | Gabriel García Márquez | Ficción | 1967 | 496 | ✅ Sí | 5 |
| 9788437604949 | La colmena | Camilo José Cela | Historia | 1951 | 365 | ❌ No | 0 |

---

## 👨‍💻 Tecnologías utilizadas

- **PHP 7.4+** - Lógica del servidor
- **HTML5** - Estructura de páginas
- **CSS3** - Diseño y estilos
- **JavaScript** - Confirmaciones y efectos
- **XAMPP** - Entorno de desarrollo

---

## 📞 Contacto

**Desarrollado por:** [Jim Thommy Beutelschies Umaña]  
**Fecha de entrega:** [15/6/2026]  
**Versión:** 1.0

---





