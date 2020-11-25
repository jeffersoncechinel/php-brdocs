# BrDocs

PHP BrDocs é uma lib especializada em gerar, validar e formatar documentos brasileiros.

[![License: MIT](https://img.shields.io/badge/License-MIT-brightgreen.svg)](https://opensource.org/licenses/MIT)

Documentos suportados até o momento
----

 - CPF - Cadastro de Pessoa Física
 - CNPJ - Cadastro Nacional de Pessoa Jurídica

Requisitos
----
- PHP >=5.4

Instalação
----

Use o gerenciador de pacotes [composer](https://getcomposer.org/download/) para instalar o BrDocs.

```bash
composer require jeffersoncechinel/php-brdocs
```

Exemplo de uso
----

```php
use JC\BrDocs\BrDoc;

$brDoc = new BrDoc();

// Validar CPF
$brDoc->cpf()->validate('111.222.333-44'); # retorna true/false
$brDoc->cpf()->validate('11122233344'); # retornar true/false

// Formatar CPF
$brDoc->cpf()->format('11122233344'); # retorna 111.222.333-44

// Validar CNPJ
$brDoc->cnpj()->validate('11.222.333/0001-10'); # retorna true/false
$brDoc->cnpj()->validate('11222333000110'); # retorna true/false

// Formatar CNPJ
$brDoc->cnpj()->format('11222333000110'); # retorna 11.222.333/0001-10
```

Contributing
----
Pull requests são bem vindos. 
Certifique-se de atualizar os testes apropriadamente.

Licença
----
[MIT](https://choosealicense.com/licenses/mit/)