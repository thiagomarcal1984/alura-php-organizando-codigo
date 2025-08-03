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

# Usando a linguagem
## Manipulando arrays
Algumas funções que operam sobre arrays:
- `sort($array)` ordena os valores de um array;
- `min($array)` retorna menor valor de um array;
- `max($array)` retorna o maior valor de um array.
> A função `sort` do PHP recebe parâmetros `por referência` (e não por cópia). É possível implementarmos a passagem de parâmetros por referência no PHP **prefixando o nome do parâmetro com um `&`**:
> ```PHP
> function passagemPorParametro(array &$array) {
>       // Implementação que muda o conteúdo de $array.
> }
> ```
> Outras funções de operação sobre arrays estão disponíveis em https://www.php.net/manual/en/ref.array.php.

## Operando com textos
Vamos falar das funções `substr` e `strpos`:

```PHP
$filme = [
    "nome" => "Thor: Ragnarok",
    "ano" => 2021,
    "nota" => 7.8,
    "genero" => "super-herói",
];


// Retorna 4, que seria a quinta posição onde está os dois pontos.
$posicaoDoisPontos = strpos( // STRing POSition.
    $filme["nome"], // string onde será feita a pesquisa;
    ":" // string procurada para retornar a posição.
);

// Retorna "Thor". 
var_dump(substr( //SUBSTRing
    $filme["nome"], // string de onde será tirada a substring;
    0, // inteiro que representa a posição inicial;
    $posicaoDoisPontos // inteiro que representa a posição ifnal.
));
```
> Outras funções que operam sobre string estão documentadas em https://www.php.net/manual/en/ref.strings.php .
