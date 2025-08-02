# Evoluindo o ScreenMatch
## Separando o código
Vamos criar uma função no PHP e invocá-la:
```PHP
function exibeMensagemLancamento ($ano) {
    if ($ano > 2022) {
        echo "Esse filme é um lançamento\n";
    } elseif($ano > 2020 && $ano <= 2022) {
        echo "Esse filme ainda é novo\n";
    } else {
        echo "Esse filme não é um lançamento\n";
    }
}
// Resto do código
exibeMensagemLancamento(1990);
```
## Funções e retorno
Funções podem retornar valores.
```PHP
function incluidoNoPlano($planoPrime, $anoLancamento) {
    return $planoPrime || $anoLancamento < 2020;
}
// Resto do código
$incluidoNoPlano = incluidoNoPlano($planoPrime, $anoLancamento);
```
## Adicionando tipos
Tipagem nas funções e nos seus retornos dá mais robustez ao código: previne erros pelo desenvolvedor e facilita a compreensão do seu retorno.
```PHP
function exibeMensagemLancamento (int $ano): void {
    // Resto do código
}

function incluidoNoPlano(bool $planoPrime, int $anoLancamento): bool {
    // Resto do código
}
```
> Nos parâmetros, o tipo é colocado antes do nome da variável. 
> 
> Nos retornos, usamos `): tipo {` entre o final do parênteses dos parâmetros e o início do bloco de código com chaves.
