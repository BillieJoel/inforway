<?php
function gerarNumero($minimo, $maximo) {
    // Gera um número aleatório dentro do intervalo especificado
    return rand($minimo, $maximo);
}

// Uso do gerador de números
$numeroAleatorio = gerarNumero(0, 1);

echo "Número gerado: $numeroAleatorio";
?>