
![alt text](http://woza.com.br/oza.png "Woza Soluções Digitais")

# Woza projeto Works 

>Um projeto que se comunica com página web da empresa, onde através dele pode está atualizando os funcionários da empresa e suas informação, para consulta do cliente e interessados.
 
>>Também integramos ao sistema funcionalidade de agendamento, onde o funcionário poderá esta colocando seus compromissos para controle e monitoramento de seus superiores tanto a rotina quanto a custo do compromisso agendando.

>>Outra funcionalidade integrada é a função de cadastra cliente e seus documentos de forma que os superiores possam esta vendo e coletando as informações, armazenando no banco de dados para consulta a qualquer hora. 

>Estamos trabalhando em novas funcionalidades que atenda a demanda.

## Instalação

Você pode clonar este repositório OU baixar o .zip

Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

Vá até a pasta do projeto, pelo *prompt/terminal* e execute:
> composer install

Depois é só aguardar.

[Banco de dados aqui!!!](https://mega.nz/file/dJpRHK6Q#B-9055xTuFoLcn1MGtjIz9ipTWQSkv-47UU6i40-l8A)<br>

>Para instalar primeiro passo é cria o banco de dados com o nome works;
>Em seguida importa as tabelas banco de dados baixado em cima.

## Configuração
Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

As configurações de Banco de Dados e URL terão que ser criada  no arquivo *src/Config.php*
>Com as seguintes linhas de código
```php
<?php
namespace src;

class Config {<br>

    //developer<br>
    const BASE_DIR = '/Sistema-ERP/public/';// url base do sistema <br>

    const DB_DRIVER = 'mysql';<br>
    const DB_HOST = 'localhost'; //local do banco de dados <br>
    const DB_DATABASE = 'works'; //nome do banco de dados<br>
    CONST DB_USER = 'root';// nome de login no banco de dados<br> 
    const DB_PASS = '';// senha de login no banco de dados <br>

    const ERROR_CONTROLLER = 'ErrorController';<br>
    const DEFAULT_ACTION = 'index';<br>
}
```
É importante configurar corretamente a constante *BASE_DIR*:
> const BASE_DIR = '/**PastaDoProjeto**/public';

Outro importancia e o index.php da '/**PastaDoProjeto**/';

Aqui tem que cria um header para  **'/PastaDoProjeto/public'**;

>Exemplo:
```php
// aqui esta reledicionando para pasta public
<?php
header('Location: http://localhost/Sistema-ERP/public/login');?>
```

Estruruta de pasta para salva arquivos, da forma que esta o nosso **controller** atual: 

![alt text](http://woza.com.br/estruturadepasta-works.JPG "Estrutura de pasta")

## Uso
Você deve acessar a pasta *public* do projeto.

O ideal é criar um ***alias*** específico no servidor que direcione diretamente para a pasta *public*.
Como já mencionado!

Temos login ficticio criado no banco de dados com a senha 123, ou você pode cria um direto no banco de dados para tera que colocar a senha no forma de hash md5. 

Então o indicado é usar já existente, caso acha algum problema ou dúvida entre em contato.

## Modelo de MODEL
```php
<?php
namespace src\models;
use \core\Model;

class Users extends Model {

}
```
