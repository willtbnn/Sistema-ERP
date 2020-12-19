## Woza em seu primeiro projeto 

Este projeto esta baseado em experiência de varios aprendizados, colocaremos aqui tudo o possivel em prativa de php, javascript, bootstrap e possivelmente ajax e json. 

No inicio só estou utilizando uma biblioteca que é IMask e icones em formato svg.
Comecei o uso de Sass(usand scout app) mais minha maquina deu ruim, então parei e continuei usando Css normal.

## Instalação
Você pode clonar este repositório OU baixar o .zip

Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

Vá até a pasta do projeto, pelo *prompt/terminal* e execute:
> composer install

Depois é só aguardar.

[Banco de dados aqui!!!](https://mega.nz/file/dJpRHK6Q#B-9055xTuFoLcn1MGtjIz9ipTWQSkv-47UU6i40-l8A)

## Configuração
Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

As configurações de Banco de Dados e URL estão no arquivo *src/Config.php*

É importante configurar corretamente a constante *BASE_DIR*:
> const BASE_DIR = '/**PastaDoProjeto**/public';

## Uso
Você deve acessar a pasta *public* do projeto.

O ideal é criar um ***alias*** específico no servidor que direcione diretamente para a pasta *public*.

## Modelo de MODEL
```php
<?php
namespace src\models;
use \core\Model;

class Users extends Model {

}
```