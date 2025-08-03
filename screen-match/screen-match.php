<?php

require __DIR__ . "/funcoes.php";

echo "Bem-vindo(a) ao screen match!\n";

$nomeFilme = "Top Gun - Maverick";

$anoLancamento = 2022;

$quantidadeDeNotas = $argc - 1;
$notas = [];

for ($contador = 1; $contador < $argc; $contador++) {
    $notas[] = (float) $argv[$contador];
}

$notaFilme = array_sum($notas) / $quantidadeDeNotas;
$planoPrime = true;

$incluidoNoPlano = incluidoNoPlano($planoPrime, $anoLancamento);

echo "Nome do filme: " . $nomeFilme . "\n";
echo "Nota do filme: $notaFilme\n";
echo "Ano de lançamento: $anoLancamento\n";

exibeMensagemLancamento($anoLancamento);

$genero = match ($nomeFilme) {
    "Top Gun - Maverick" => "ação",
    "Thor: Ragnarok" => "super-herói",
    "Se beber não case" => "comédia",
    default => "gênero desconhecido",
};

echo "O gênero do filme é: $genero\n";

$filme = criaFilme(
    ano: 2021,
    nome: "Thor: Ragnarok",
    genero: "super-herói",
    nota: 7.8,
);


echo $filme["ano"];

$filmeComoStringJson = json_encode($filme);
file_put_contents(__DIR__ . '/filme.json', $filmeComoStringJson);

$filme = json_decode(file_get_contents(__DIR__ . '/filme.json'), true);
var_dump($filme);
unlink(__DIR__ . '/filme.json'); // Remove o JSON.
