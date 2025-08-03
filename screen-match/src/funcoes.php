<?php
function exibeMensagemLancamento (int $ano): void {
    if ($ano > 2022) {
        echo "Esse filme é um lançamento\n";
    } elseif($ano > 2020 && $ano <= 2022) {
        echo "Esse filme ainda é novo\n";
    } else {
        echo "Esse filme não é um lançamento\n";
    }
}

function incluidoNoPlano(bool $planoPrime, int $anoLancamento): bool {
    return $planoPrime || $anoLancamento < 2020;
}

function criaFilme(string $nome, int $ano, float $nota, string $genero): array {
    return [
        "nome" => $nome,
        "ano" => $ano,
        "nota" => $nota,
        "genero" => $genero,
    ];
}
