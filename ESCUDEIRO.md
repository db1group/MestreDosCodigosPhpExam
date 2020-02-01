# Exercícios da prova de escudeiro PHP do Mestre dos códigos

Para validar a resolução das suas questões, veja as [instruções na página principal](README.md)

> Dica: Use e abuse dos seus conhecimentos de orientação à objetos, separação por namespaces e testes. Lembre-se que aqui não existe over engineering!

### *(variables)* Imprima as letras das opções abaixo que são nomes INVÁLIDOS para variáveis:
* A)  $escudeiro
* B)  $1mestre 	 
* C) $_cavaleiro
* D) $__codigo
* E) $mestre@codigo 	 
* F) $mestre1
* G) $escudeiro-1 	  
* H) $mestreDosCodigos
* I) $db1_


### *(error-in-try)* O código abaixo possui um erro; Imprima a letra da alternativa que melhor descreve esse erro:
```
try{
  $username = $this->getUserName();
  $password = $this->getPassword();
  $db = new PDO('mysql:host=localhost;dbname=mydb', $username, $password);
}
```

* A) Não há necessidade de usar o try
* B) O new PDO(...) não é um sintaxe válida para o PHP
* C) O try precisa ter ; após o fechamento da }
* D) O try deve ter um catch ou um finally   


### *(superglobal)* Imprima as letras das opções abaixo que são variáveis superglobais:
* A) $_GOT
* B) $_ENV 	 
* C) $_COOKIES
* D) $_POS

### *(trouble-array)* De acordo com o código abaixo, a variável `$a` conterá:
```
array("a", "b", "c", "d");
$a[] = "e";
```

* A) `[‘e’]`
* B) `[‘e’, ‘a’, ‘b’, ‘c’, ‘d’]`
* C) Não é 	possível atribuir valor a um array dessa forma
* D) `[‘a’, ‘b’, ‘c’, ‘d’, ‘e’]`
* E) O array será nulo

### *(count-a)* Você deve desenvolver um algoritmo que conte a quantidade de letras *‘a’* presentes em uma string. Haverão dois parâmetros de entrada para o algoritmo: Uma palavra e o tamanho dessa palavra que será considerado na hora de contar. O tamanho indica a quantidade de letras que a palavra deverá ter na hora da contagem; Caso o número de letras seja maior que o tamanho, corte a string; caso seja menor, replique a palavra até atingi-lo.
Ex1:
```
string = aba
inteiro = 10
retorno = Existem 7 letras 'a' na palavra abaabaabaa.
```

Ex2:
```
string = medico
inteiro = 15
retorno = Existem 0 letras 'a' na palavra medicomedicomed.
```

Ex3:
```
string = cachorro
inteiro = 2
retorno = Existem 1 letra 'a' na string ca.
```

### *(palindrome)* Desenvolva um sistema que recebe uma lista de frases e mostre na tela apenas as frases que são um [palíndromo](https://brasilescola.uol.com.br/o-que-e/portugues/o-que-e-palindromo.htm).

### *(fibonacci)* Seguinto o algoritmo de [Fibonacci](https://pt.wikipedia.org/wiki/Sequ%C3%AAncia_de_Fibonacci), implemente um algorítmo PHP que recebe um número *n* e retorne o n-ésimo número da sequência de fibonacci em menos de X segundos.
Exemplos:
```sh
$~> 1
1
```
```sh
$~> 2
1
```
```sh
$~> 8
21
```
```sh
$~> 37
24157817
```

### *(atm)* Desenvolva um algoritmo de caixa eletrônico que retorne o menor número possível de cédulas de acordo com o valor desejado para saque. Considere que existem cédulas de 100, 50, 20, 10, 5, 1. O usuário pode sacar apenas valores inteiros (sem centavos) e o caixa eletrônico tem um número infinito de cédulas. O retorno do sistema deverá ser uma string e ter o seguinte formato:
Ex1:
```
valor = 299
retorno = [100 => 2, 50 => 1, 20 => 2, 5 => 1, 2 => 2]
```

Ex2:
```
valor = 0
retorno = Este valor não é válido
```

### *(fizz-buzz)* FizzBuzz é um jogo usado para ensinar divisão, onde pessoas sentam-se em formato de círculo e começam a contar em voz alta; Sempre que um número for divisível por 3, deve-se dizer Fizz ao invés do número e sempre que um número for divisível por 5, deve-se dizer Buzz; Caso seja divisível tanto por 3 quanto por 5, deve-se dizer FizzBuzz. Você deve criar um algoritmo que reproduza essa brincadeira onde a entrada será um número inteiro e a saída vai ser o Fizz, Buzz, FizzBuzz ou o próprio número.
Exemplos:
```sh
~$> 1
1
```
```sh
~$> 2
2
```
```sh
~$> 3
Fizz
```
```sh
~$> 9
Fizz
```
```sh
~$> 5
Buzz
```
```sh
~$> 15
FizzBuzz
```

### *(ddos-tracker)* Sua aplicação está sendo bombardeada com requisições de todo o mundo e você precisa ter uma noção de que região do planeta essas requisições estão partindo; O problema é que a única informação disponível é a hora local do ponto onde a requisição foi enviada. Seu trabalho será descobrir um provável fuso-horário de onde essas requisições acabaram de partir.
```sh
$~> 2019-05-13 15:36:21
America/Argentina/Mendoza
```
```sh
$~> 2019-05-14 06:36:22
Pacific/Yap
```
```sh
$~> 2019-05-13 11:36:23
America/Yellowknife
```

### *(calculator)* Desenvolva uma calculadora mais orientada a objetos que conseguir. A calculadora deverá ter as seguintes operações: adição, subtração, divisão, multiplicação.
```sh
$~> 1 + 1
2.00 
```
```sh
$~> 3 – 4
-1.00
```
```sh
$~> 2 / 2
1.00
```
```sh
$~> 3 * 3
9.00
```
```sh
$~> 2 + 2 * 3
8.00
```
```sh
$~> 3 * 2.7 + 2
10.10
```
```sh
$~> 5 – 15 / 3
0.00
```
```sh
$~> 3 / 0
Erro de divisão por 
```
```sh
$~> 3 + 1 / 1 * 5 + 1
9.00
```

### *(secret-salt)* Você deve retornar um hash feito com o algoritmo SHA256, usando de entrada um valor provido pelo usuário, visando garantir que o valor original nunca seja descoberto. Para adicionar uma segurança extra, não esqueça de salgar esse hash com a variável de ambiente `HASH_SALTING_VALUE`.

### *(pimp-my-log)* Seu sistema processa milhares de pagamentos ao dia e registra diversos logs para monitorar o estado e alimentar métricas. Com a nova LGPD entrando em vigor, não podemos mais registrar dados pessoais do pagador de cada transação, então sua responsabilidade é limpar esses logs antes do armazenamento.
Apesar de variar como é exibido, cada linha do log possui um IP, número de cartão de crédito, dígito verificador e data de vencimento; Todas essas informações devem ser substituídas por *.
```sh
$-> 123.123.123.123 - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card 5124.1251.1223.2523, cvv: 827, exp date: 09/22"
***.***.***.*** - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Payment confirmed with credit card ****.****.****.****, cvv: ***, exp date: **/**"
```
```sh
$-> 123.123.123.123 - [10/Jan/2020:00:23:48 -0300] "POST /payment HTTP/1.0" Credit card 5124.1251.1223.2523, cvv 827, expiration date 09/22 had the payment refused"
***.***.***.*** - [10/Jan/2020:00:23:49 -0300] "POST /payment HTTP/1.0" Credit card ****.****.****.****, cvv ***, expiration date **/** had the payment refused"

