<?php
function filtrarMenoresQueLimite($array, $limite) {
    $resultado = []; // Array para almacenar los elementos que cumplen la condición
    
    foreach ($array as $numero) {
        if ($numero < $limite) {
            $resultado[] = $numero; // Agregar al nuevo array si es menor que el límite
        }
    }
    
    return $resultado; // Devolver el nuevo array
}

// Definir un array de números para el desplegable
$numeros = range(1, 50); // Array de números del 1 al 50
$limite = 15; // Limite predeterminado

$resultado = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el límite seleccionado
    $limite = intval($_POST['limite']);
    
    // Filtrar los números menores que el límite
    $resultado = filtrarMenoresQueLimite($numeros, $limite);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Filtrar Números Menores que un Límite</title>
</head>
<body>
    <h1>Filtrar Números Menores que un Límite</h1>
    <form method="POST">
        <label for="limite">Selecciona un límite:</label>
        <select name="limite" id="limite">
            <?php foreach ($numeros as $numero): ?>
                <option value="<?= $numero ?>" <?= $numero == $limite ? 'selected' : '' ?>><?= $numero ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Filtrar</button>
    </form>

    <?php if ($resultado): ?>
        <h2>Números menores que <?= $limite ?>:</h2>
        <p><?= implode(", ", $resultado) ?></p>
    <?php endif; ?>

    <?php echo "José Antonio Avellán Martín Implantación de aplicaciones web 2ª ASIR Vespertino"; ?>
</body>
</html>