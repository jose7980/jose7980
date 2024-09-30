<?php
function resolverEcuacionCuadratica($a, $b, $c) {
    if ($a == 0) return FALSE; // 'a' no puede ser cero
    $D = $b * $b - 4 * $a * $c; // Calcular el discriminante
    if ($D < 0) return FALSE; // Sin soluciones reales
    return $D == 0 ? [-$b / (2 * $a)] : [
        (-$b + sqrt($D)) / (2 * $a),
        (-$b - sqrt($D)) / (2 * $a)
    ];
}

$resultado = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = intval($_POST['a']);
    $b = intval($_POST['b']);
    $c = intval($_POST['c']);
    $soluciones = resolverEcuacionCuadratica($a, $b, $c);
    
    // Determinar si hay error o soluciones
    if ($soluciones === FALSE) {
        $error = "No hay soluciones reales.";
    } else {
        $resultado = implode(", ", $soluciones);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resolver Ecuación de Segundo Grado con Array</title>
</head>
<body>
    <h1>Resolver Ecuación de Segundo Grado con Array</h1>
    <form method="POST">
        <label for="a">a:</label>
        <select name="a" id="a">
            <?= implode('', array_map(fn($i) => "<option value='$i'>$i</option>", range(-10, 10))) ?>
        </select>
        <label for="b">b:</label>
        <select name="b" id="b">
            <?= implode('', array_map(fn($i) => "<option value='$i'>$i</option>", range(-10, 10))) ?>
        </select>
        <label for="c">c:</label>
        <select name="c" id="c">
            <?= implode('', array_map(fn($i) => "<option value='$i'>$i</option>", range(-10, 10))) ?>
        </select>
        <button type="submit">Resolver</button>
    </form>

    <?php if ($error): ?>
        <h2 style="color:red;">Error:</h2>
        <p><?= $error ?></p>
    <?php elseif ($resultado): ?>
        <h2>Soluciones:</h2>
        <p><?= $resultado ?></p>
    <?php endif; ?>
    <?php echo "José Antonio Avellán Martín Implantación de aplicaciones web 2ª ASIR Vespertino"?>
</body>
</html>