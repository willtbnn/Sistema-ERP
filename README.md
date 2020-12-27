## Woza em seu primeiro projeto 


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

[Banco de dados aqui!!!](https://mega.nz/file/dJpRHK6Q#B-9055xTuFoLcn1MGtjIz9ipTWQSkv-47UU6i40-l8A)

## Configuração
Todos os arquivos de **configuração** e aplicação estão dentro da pasta *src*.

As configurações de Banco de Dados e URL estão no arquivo *src/Config.php*

É importante configurar corretamente a constante *BASE_DIR*:
> const BASE_DIR = '/**PastaDoProjeto**/public';

Outro importancia e o index.php da '/**PastaDoProjeto**/';<br>
Aqui estamos temos que cria um header para  '/**PastaDoProjeto**/public';<br>
>Exemplo:
>**header('Location: http://localhost/Sistema-ERP/public/login');**
>
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
