<?php
// matematica.php
function resolverEcuacionCuadratica($a, $b, $c) {
    if ($a == 0) return FALSE; // 'a' no puede ser cero
    $D = $b * $b - 4 * $a * $c; // Calcular el discriminante
    if ($D < 0) return FALSE; // Sin soluciones reales
    return $D == 0 ? [-$b / (2 * $a)] : [
        (-$b + sqrt($D)) / (2 * $a),
        (-$b - sqrt($D)) / (2 * $a)
    ];
}
?>