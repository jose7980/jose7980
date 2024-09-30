<?php
// Función para comprobar si una cadena es un palíndromo
function esPalindromo($cadena) {
    // Eliminar espacios y convertir a minúsculas
    $cadenaLimpiada = preg_replace('/\s+/', '', strtolower($cadena));
    
    // Invertir la cadena
    $cadenaInvertida = strrev($cadenaLimpiada);
    
    // Comparar la cadena original con la invertida
    return $cadenaLimpiada === $cadenaInvertida;
}

$resultado = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la cadena del desplegable
    $cadena = $_POST['cadena'];
    
    // Comprobar si es palíndromo
    if (esPalindromo($cadena)) {
        $resultado = "'$cadena' es un palíndromo.";
    } else {
        $resultado = "'$cadena' no es un palíndromo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobar Palíndromo</title>
</head>
<body>
    <h1>Comprobar si es un Palíndromo</h1>
    <form method="POST">
        <label for="cadena">Selecciona una cadena:</label>
        <select name="cadena" id="cadena">
            <option value="Ana coduce">Anita conduce</option>
            <option value="Amo la pacífica paloma">Amo la pacífica paloma</option>
            <option value="Dábale arroz a la zorra el abad">Dábale arroz a la zorra el abad</option>
            <option value="La ruta natural">La ruta natural</option>
            <option value="No es guapo">No es un palíndromo</option>
        </select>
        <button type="submit">Comprobar</button>
    </form>

    <?php if ($resultado): ?>
        <h2>Resultado:</h2>
        <p><?= $resultado ?></p>
    <?php endif; ?>

    <?php echo "José Antonio Avellán Martín Implantación de aplicaciones web 2ª ASIR Vespertino"; ?>
</body>
</html>