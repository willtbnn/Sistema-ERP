# Woza projeto Works 

>Um projeto que se comunica com página web da empresa, onde através dele pode está atualizando os funcionários da empresa e suas informação, para consulta do cliente e interessados.
 
>>Também integramos ao sistema funcionalidade de agendamento, onde o funcionário poderá esta colocando seus compromissos para controle e monitoramento de seus superiores tanto a rotina quanto a custo do compromisso agendando.

>>Outra funcionalidade integrada é a função de cadastra cliente e seus documentos de forma que os superiores possam esta vendo e coletando as informações, armazenando no banco de dados para consulta a qualquer hora. 

>>Nova funcionalidade é a criação de roteiros para os consultores esta vendo e melhorando a sua dinâmica com o cliente, com intuito de início de abordagem melhor com o cliente. Roteiros será criado somente pelos gerentes e coordenadores da empresa. 

>Estamos trabalhando em novas funcionalidades que atenda a demanda.

## Instalação

Você pode clonar este repositório OU baixar o .zip

Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.

Vá até a pasta do projeto, pelo *prompt/terminal* e execute:
> composer install

Depois é só aguardar.

[Banco de dados aqui!!!](https://mega.nz/file/wug0Xa7Z#wSrBfky7TDNrHy1GNqfy5m9Yf-ykn30h7swQs1SgIUU)<br>

>Para instalar primeiro passo é cria o banco de dados com o nome works;
>Em seguida importa as tabelas banco de dados baixado em cima.

## Configuração
Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

As configurações de Banco de Dados e URL terão que ser criada  no arquivo *src/Config.php*
>Com as seguintes linhas de código
```php
<?php
namespace src;

class Config {

    //developer
    const BASE_DIR = '/Sistema-ERP/public';// url base do sistema 
    const BASE_PAST = 'C:/xampp/htdocs/Sistema-ERP/public/'; //base do projeto 
    
    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost'; //local do banco de dados 
    const DB_DATABASE = 'works'; //nome do banco de dados
    CONST DB_USER = 'root';// nome de login no banco de dados 
    const DB_PASS = '';// senha de login no banco de dados 

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';
}
```
É importante configurar corretamente a constante *BASE_DIR*:
> const BASE_DIR = '/**PastaDoProjeto**/public';

Outro importancia e o index.php da '/**PastaDoProjeto**/';

Aqui tem que cria um header para  **'/PastaDoProjeto/public'**;

>Exemplo:
```php
// aqui esta redirecionando para pasta public
<?php
header('Location: http://localhost/Sistema-ERP/public/login');?>
```

Estruruta de pasta para salva arquivos, da forma que esta o nosso **controller** atual: 

![alt text](http://woza.com.br/estruturadepasta-works2.JPG "Estrutura de pasta")

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
