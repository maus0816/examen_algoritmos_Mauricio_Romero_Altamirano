<?php
function calcularPuntos($a, $b) {
    $alicePuntos = 0;
    $bobPuntos = 0;

    for ($i = 0; $i < 3; $i++) {
        if ($a[$i] > $b[$i]) {
            $alicePuntos++;
        } elseif ($a[$i] < $b[$i]) {
            $bobPuntos++;
        }
    }

    return [$alicePuntos, $bobPuntos];
}

// Ejemplo de entrada
$a = [17, 28, 30];
$b = [99, 16, 8];

// Obtener los puntos de comparación
$puntos = calcularPuntos($a, $b);

// Imprimir la salida
echo $puntos[0] . ' ' . $puntos[1];
?>