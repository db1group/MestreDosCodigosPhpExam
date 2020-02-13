# *REPOSITÓRIO DEPRECIADO*
### REPOSITÓRIO FOI MOVIDO PARA [https://github.com/db1group/MestreDosCodigosPhpExam](https://github.com/db1group/MestreDosCodigosPhpExam)

# Mestre dos códigos PHP

Para resolver a prova, é muito simples: 

Acesse a prova de [Escudeiro](ESCUDEIRO.md) e repare que cada subtítulo é uma questão diferente.

Cada questão começa com um identificador entre parênteses (ex: *(ddos-tracker)*) e você deve criar, na raíz do projeto, uma pasta com esse mesmo nome. Dentro da pasta de cada exercício, você precisa ter um arquivo `index.php`, pois nosso processo de construção automatizada vai executá-lo para rodar todos os testes que garantem que o exercício foi resolvido corretamente.

Sua prova vai estar resolvida no momento que você abrir um Pull Request contra a branch master e todas as actions executaram de forma bem sucedida.

## Exemplo de submissão

Faça o download do repositório na sua máquina:
```sh
git checkout git@github.com:db1group/MestreDosCodigosPhpExam.git
```

Crie uma branch no modelo seu_usuario_do_github/prova_que_esta_fazendo:
```sh
git checkout -b ByIvo/escudeiro
```

Crie as soluções no seguinte padrão:  
Legenda: **Diretório**, *Arquivo* e [...] (outros arquivos e pastas quaisquer)  

 **MestreDosCodigosPhpExam**
|
|__ **.github**  
|&nbsp;&nbsp;&nbsp;&nbsp;|__ **workflows**  
|  
|__ **atm**  
|&nbsp;&nbsp;&nbsp;&nbsp;|__ *index.php*  
|&nbsp;&nbsp;&nbsp;&nbsp;|__ [...]  
|  
|__ **calculator**  
|&nbsp;&nbsp;&nbsp;&nbsp;|__ *index.php*  
|&nbsp;&nbsp;&nbsp;&nbsp;|__ [...]  
|  
|__ **count-a**  
|&nbsp;&nbsp;&nbsp;&nbsp;|__ *index.php*  
|&nbsp;&nbsp;&nbsp;&nbsp;|__ [...]  
|  
|__ **[...]**  
|  
|__ *.gitignore*  
|__ *ESCUDEIRO.md*  
|__ *LICENSE*  
|__ *README*  
|__ *[...]*  

Comite e crie um Pull Request contra a branch master; Os checks serão executados automaticamente.
