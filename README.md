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
