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


## Para saber mais: mbstring
Há uma especificidade do PHP que é o fato de ele sempre assumir em suas funções que cada caractere de uma string ocupa especificamente 1 byte. O que isso quer dizer? Lidar com strings que têm caracteres com acento pode nos trazer algumas dores de cabeça. Para isso, existem funções fornecidas por uma extensão do PHP chamada mbstring.

Para entender melhor sobre como usar a extensão mbstring, você pode conferir o seguinte curso:

[Expressões Regulares: faça buscas, validações e substituições de textos](https://cursos.alura.com.br/course/expressoes-regulares-buscas-validacoes-substituicoes-textos)

Além de ler o um [post sobre mbstring](https://dias.dev/2023-03-21-strings-multibyte-php-mbstring/) e também pode conferir um [texto sobre extensões do PHP](https://dias.dev/2022-02-13-extensoes-php/).

> Segundo o Vinicius Dias: _A maioria das funções "padrão" de strings do PHP possui uma contraparte na `mbstring`, sendo apenas prefixada com `mb_`. O exemplo de código anteriormente exposto que nos gerava o resultado inesperado poderia ser escrito da seguinte forma:_
> ```php
> <?php
> echo mb_strlen('Olá'); // Exibe 3
> echo mb_strtoupper('olá'); // Exibe "OLÁ"
> ```

## Separando em arquivos
Vamos criar dois arquivos no diretório `screen-match`:
1. `funcoes.php` vai ter o código das funções que serão importadas;
2. `screen-match.php` vai ter o código principal.

```PHP
// funcoes.php
<?php
function exibeMensagemLancamento (int $ano): void {
    // Resto do código
}

function incluidoNoPlano(bool $planoPrime, int $anoLancamento): bool {
    // Resto do código
}
```

```PHP
// screen-match.php
<?php
require __DIR__ . "/funcoes.php";
// Resto do código
$incluidoNoPlano = incluidoNoPlano($planoPrime, $anoLancamento);
// Resto do código
exibeMensagemLancamento($anoLancamento);
// Resto do código
```
> 1. Os **dunder methods/magic methods** do PHP são envolvidos por double underscores (dunders). O método mágico `__DIR__` fornece o caminho absoluto do arquivo. 
> 2. Ao importar algum arquivo com `require`/`require_once`, use o dunder method `__DIR__` para que não haja confusão com o import.

# Manipulando arquivos
## Definindo um formato
Podemos criar conteúdo JSON com as funções `json_encode` e `json_decode`:

```PHP
var_dump(json_encode($filme)); // Transforma o array em um JSON.

var_dump(json_decode(
    '{"nome":"Thor: Ragnarok",
    "ano":2021,
    "nota":7.8,
    "genero":"super-her\u00f3i"}', // Transforma o JSON em um objeto.
    true // Se verdadeiro, transforma o JSON em um array associativo.
));
```
## Exportando um filme
Vamos usar a função `file_put_contents` para gravar o JSON:
```PHP
$filmeComoStringJson = json_encode($filme);
file_put_contents(__DIR__ . '/filme.json', $filmeComoStringJson);
```
## Importando dados
Vamos usar a função `file_get_contents` para ler o JSON:
```PHP
$filme = json_decode(file_get_contents(__DIR__ . '/filme.json'), true);
var_dump($filme);
unlink(__DIR__ . '/filme.json'); // Remove o JSON.
```
