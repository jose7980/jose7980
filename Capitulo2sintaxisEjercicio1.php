<?php
function resolverEcuacionCuadratica($a, $b, $c) {
    if ($a == 0) return "El valor de 'a' no puede ser cero.";

    $D = ($b * $b) - (4 * $a * $c);

    if ($D > 0) {
        $x1 = (-$b + sqrt($D)) / (2 * $a);
        $x2 = (-$b - sqrt($D)) / (2 * $a);
        return "Soluciones reales: x1 = $x1, x2 = $x2";
    } elseif ($D == 0) {
        return "Solución única: x = " . (-$b / (2 * $a));
    } else {
        $realPart = -$b / (2 * $a);
        $imaginaryPart = sqrt(-$D) / (2 * $a);
        return "Soluciones complejas: x1 = $realPart + {$imaginaryPart}i, x2 = $realPart - {$imaginaryPart}i";
    }
}

$resultado = "";
$error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = intval($_POST['a']);
    $b = intval($_POST['b']);
    $c = intval($_POST['c']);
    
    if ($a == 0) {
        $error = "No tiene soluciones reales.";
    } else {
        $resultado = resolverEcuacionCuadratica($a, $b, $c);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resolver Ecuación de Segundo Grado</title>
</head>
<body>
    <h1>Resolver Ecuación de Segundo Grado</h1>
    <form method="POST">
        <label for="a">a:</label>
        <select name="a" id="a"><?php for ($i = -10; $i <= 10; $i++) echo "<option value='$i'>$i</option>"; ?></select>
        <label for="b">b:</label>
        <select name="b" id="b"><?php for ($i = -10; $i <= 10; $i++) echo "<option value='$i'>$i</option>"; ?></select>
        <label for="c">c:</label>
        <select name="c" id="c"><?php for ($i = -10; $i <= 10; $i++) echo "<option value='$i'>$i</option>"; ?></select>
        <button type="submit">Resolver</button>
    </form>

    <?php if ($error) echo "<h2 style='color:red;'>Error:</h2><p>$error</p>"; ?>
    <?php if ($resultado) echo "<h2>Resultado:</h2><p>$resultado</p>"; ?>
    <?php echo "José Antonio Avellán Martín Implantación de aplicaciones web 2ª ASIR Vespertino"?>

</body>
</html>