<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Prueba de Funciones PHP</title>
</head>
<body>

<h2>Selecciona una función para probar</h2>

<form method="post" action="">
    <label for="funcion">Elige una función:</label>
    <select name="funcion" id="funcion">
        <option value="isset">isset</option>
        <option value="is_null">is_null</option>
        <option value="empty">empty</option>
        <option value="strlen">strlen</option>
        <option value="explode">explode</option>
        <option value="implode">implode</option>
        <option value="strcmp">strcmp</option>
        <option value="strtolower">strtolower</option>
        <option value="strtoupper">strtoupper</option>
        <option value="sort">sort</option>
        <option value="rsort">rsort</option>
        <option value="array_keys">array_keys</option>
        <option value="array_values">array_values</option>
        <option value="array_key_exists">array_key_exists</option>
        <option value="count">count</option>
    </select>
    <br><br>
    <input type="submit" value="Probar Función">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $funcion = $_POST['funcion'];

    // Variables de prueba
    $var = "Hola";
    $nullVar = null;
    $cadena = "Hola Mundo";
    $array = [1, 2, 3];
    $arrayAssoc = ["clave1" => "valor1", "clave2" => "valor2"];
    $clave = "clave1";

    echo "<h3>Resultado de la función '$funcion':</h3>";

    switch ($funcion) {
        case 'isset':
            echo "Resultado: isset(\$var) => " . (isset($var) ? 'true' : 'false');
            break;

        case 'is_null':
            echo "Resultado: is_null(\$nullVar) => " . (is_null($nullVar) ? 'true' : 'false');
            break;

        case 'empty':
            echo "Resultado: empty(\$var) => " . (empty($var) ? 'true' : 'false');
            break;

        case 'strlen':
            echo "Resultado: strlen(\$cadena) => " . strlen($cadena) . " caracteres";
            break;

        case 'explode':
            $cadenaExplode = "uno,dos,tres";
            $arrayExploded = explode(",", $cadenaExplode);
            echo "Resultado: explode(',', \$cadenaExplode) => ";
            echo implode(", ", $arrayExploded); // Formateado como lista separada por comas
            break;

        case 'implode':
            $arrayToImplode = ["uno", "dos", "tres"];
            $cadenaImploded = implode("-", $arrayToImplode);
            echo "Resultado: implode('-', \$arrayToImplode) => $cadenaImploded";
            break;

        case 'strcmp':
            $cadena1 = "Hola";
            $cadena2 = "hola";
            $resultado = strcmp($cadena1, $cadena2);
            echo "Resultado: strcmp(\$cadena1, \$cadena2) => $resultado (0: iguales, -1: \$cadena1 < \$cadena2, 1: \$cadena1 > \$cadena2)";
            break;

        case 'strtolower':
            $cadenaLower = "HOLA";
            echo "Resultado: strtolower(\$cadenaLower) => " . strtolower($cadenaLower);
            break;

        case 'strtoupper':
            $cadenaLower = "hola";
            echo "Resultado: strtoupper(\$cadenaLower) => " . strtoupper($cadenaLower);
            break;

        case 'sort':
            $arrayToSort = [3, 2, 5, 1, 4];
            sort($arrayToSort);
            echo "Resultado: sort(\$arrayToSort) => " . implode(", ", $arrayToSort);
            break;

        case 'rsort':
            $arrayToSort = [3, 2, 5, 1, 4];
            rsort($arrayToSort);
            echo "Resultado: rsort(\$arrayToSort) => " . implode(", ", $arrayToSort);
            break;

        case 'array_keys':
            echo "Resultado: array_keys(\$arrayAssoc) => " . implode(", ", array_keys($arrayAssoc));
            break;

        case 'array_values':
            echo "Resultado: array_values(\$arrayAssoc) => " . implode(", ", array_values($arrayAssoc));
            break;

        case 'array_key_exists':
            echo "Resultado: array_key_exists(\$clave, \$arrayAssoc) => " . (array_key_exists($clave, $arrayAssoc) ? 'true' : 'false');
            break;

        case 'count':
            echo "Resultado: count(\$arrayAssoc) => " . count($arrayAssoc) . " elementos";
            break;

        default:
            echo "Función no reconocida.";
            break;
    }
}
?>

</body>
</html>