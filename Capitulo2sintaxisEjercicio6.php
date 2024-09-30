<?php
// Función para resolver ecuaciones cuadráticas
function resolverEcuacionCuadratica($a, $b, $c) {
    if ($a == 0) return FALSE; // 'a' no puede ser cero
    $D = $b * $b - 4 * $a * $c; // Calcular el discriminante
    if ($D < 0) return FALSE; // Sin soluciones reales
    return $D == 0 ? [-$b / (2 * $a)] : [
        (-$b + sqrt($D)) / (2 * $a),
        (-$b - sqrt($D)) / (2 * $a)
    ];
}

// Función para comprobar si una cadena es un palíndromo
function esPalindromo($cadena) {
    $cadenaLimpiada = preg_replace('/\s+/', '', strtolower($cadena));
    $cadenaInvertida = strrev($cadenaLimpiada);
    return $cadenaLimpiada === $cadenaInvertida;
}

// Función para filtrar un array de números menores que un límite
function filtrarMenoresQueLimite($array, $limite) {
    $resultado = [];
    foreach ($array as $numero) {
        if ($numero < $limite) {
            $resultado[] = $numero;
        }
    }
    return $resultado;
}

// --------------------- Manejo de Peticiones --------------------- //

$solucionEcuacion = "";
$palindromoResultado = "";
$resultadoFiltrado = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Comprobar qué tipo de prueba se está realizando
    if (isset($_POST['tipo_prueba'])) {
        $tipoPrueba = $_POST['tipo_prueba'];

        // Prueba de la ecuación cuadrática
        if ($tipoPrueba == 'ecuacion') {
            $a = intval($_POST['a']);
            $b = intval($_POST['b']);
            $c = intval($_POST['c']);
            $soluciones = resolverEcuacionCuadratica($a, $b, $c);
            $solucionEcuacion = $soluciones === FALSE ? "No hay soluciones reales." : implode(", ", $soluciones);
        }

        // Prueba de palíndromo
        elseif ($tipoPrueba == 'palindromo') {
            $cadena = $_POST['cadena'];
            $palindromoResultado = esPalindromo($cadena) ? "'$cadena' es un palíndromo." : "'$cadena' no es un palíndromo.";
        }

        // Prueba de filtrar números
        elseif ($tipoPrueba == 'filtrar') {
            $arrayNumeros = range(1, 50); // Array de números del 1 al 50
            $limite = intval($_POST['limite']);
            $resultadoFiltrado = filtrarMenoresQueLimite($arrayNumeros, $limite);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pruebas de Funciones</title>
</head>
<body>
    <h1>Pruebas de Funciones</h1>

    <!-- Formulario para resolver ecuaciones cuadráticas -->
    <h2>Resolver Ecuación Cuadrática</h2>
    <form method="POST">
        <input type="hidden" name="tipo_prueba" value="ecuacion">
        <label for="a">a:</label>
        <select name="a" id="a">
            <?php for ($i = -10; $i <= 10; $i++): ?>
                <option value="<?= $i ?>" <?= $i == 1 ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <label for="b">b:</label>
        <select name="b" id="b">
            <?php for ($i = -10; $i <= 10; $i++): ?>
                <option value="<?= $i ?>" <?= $i == -3 ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <label for="c">c:</label>
        <select name="c" id="c">
            <?php for ($i = -10; $i <= 10; $i++): ?>
                <option value="<?= $i ?>" <?= $i == 2 ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <button type="submit">Resolver</button>
    </form>
    <p>Soluciones: <?= $solucionEcuacion ?></p>

    <!-- Formulario para comprobar palíndromos -->
    <h2>Comprobar Palíndromo</h2>
    <form method="POST">
        <input type="hidden" name="tipo_prueba" value="palindromo">
        <label for="cadena">Cadena:</label>
        <select name="cadena" id="cadena">
            <option value="Anita lava la tina">Anita lava la tina</option>
            <option value="Amo la pacífica paloma">Amo la pacífica paloma</option>
            <option value="No es un palíndromo">No es un palíndromo</option>
            <option value="Dábale arroz a la zorra el abad">Dábale arroz a la zorra el abad</option>
            <option value="La ruta natural">La ruta natural</option>
        </select>
        <button type="submit">Comprobar</button>
    </form>
    <p>Resultado: <?= $palindromoResultado ?></p>

    <!-- Formulario para filtrar números -->
    <h2>Filtrar Números Menores que un Límite</h2>
    <form method="POST">
        <input type="hidden" name="tipo_prueba" value="filtrar">
        <label for="limite">Selecciona un límite:</label>
        <select name="limite" id="limite">
            <?php for ($i = 1; $i <= 50; $i++): ?>
                <option value="<?= $i ?>" <?= $i == 15 ? 'selected' : '' ?>><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <button type="submit">Filtrar</button>
    </form>
    <p>Números menores que el límite: <?= implode(", ", $resultadoFiltrado) ?></p>

    <?php echo "José Antonio Avellán Martín Implantación de aplicaciones web 2ª ASIR Vespertino"; ?>
</body>
</html>