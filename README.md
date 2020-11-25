# BrDocs
##### Manipulação de números de documentos brasileiros de forma fácil
PHP BrDocs auxilia na validação e formatação de documentos brasileiros como CPF e CNPJ.

[![License: MIT](https://img.shields.io/badge/License-MIT-brightgreen.svg)](https://opensource.org/licenses/MIT)

Documentos suportados até o momento
----

 - CPF - Cadastro de Pessoa Física
 - CNPJ - Cadastro Nacional de Pessoa Jurídica

Requisitos
----
- PHP >= 5.4

Instalação
----

Use o gerenciador de pacotes [composer](https://getcomposer.org/download/) para instalar o BrDocs.

```bash
composer require jeffersoncechinel/php-brdocs
```

Exemplo de uso
----

Exemplos de como validar e formatar um CPF

```php
use JC\BrDocs\BrDoc;

$obj = new BrDoc();

// Verificar se um CPF é válido com input formatado
var_dump($obj->cpf('059.440.570-09')->isValid());
//bool(true)

// Verificar se um CPF é válido com input normalizado
var_dump($obj->cpf('05944057009')->isValid());
//bool(true)

// Normalizar o CPF antes de validar
var_dump($obj->cpf('5944057009')->normalize()->isValid());
//bool(true)

// Formatar um CPF
var_dump($obj->cpf('05944057009')->format()->get());
//string(14) "045.111.359-40"

// Normalizar e formatar um CPF
var_dump($obj->cpf('05944057009')->normalize()->format()->get());
//string(14) "045.111.359-40"

// Normalizar, validar e formatar um CPF
var_dump($obj->cpf('05944057009')->normalize()->validate()->format()->get());
//string(14) "045.111.359-40"


```

Exemplos de como validar e formatar um CNPJ

```php
use JC\BrDocs\BrDoc;

$obj = new BrDoc();

// Verificar se um CNPJ é válido com input formatado
var_dump($obj->cnpj('03.939.810/0001-04')->isValid());
//bool(true)

// Verificar se um CNPJ é válido com input normalizado
var_dump($obj->cnpj('03939810000104')->isValid());
//bool(true)

// Normalizar o CNPJ antes de validar
var_dump($obj->cnpj('3939810000104')->normalize()->isValid());
//bool(true)

// Formatar um CNPJ
var_dump($obj->cnpj('03939810000104')->format()->get());
//string(18) "03.939.810/0001-04"

// Normalizar e formatar um CNPJ
var_dump($obj->cnpj('3939810000104')->normalize()->format()->get());
//string(18) "03.939.810/0001-04"

// Normalizar, validar e formatar um CNPJ
var_dump($obj->cnpj('3939810000104')->normalize()->validate()->format()->get());
//string(18) "03.939.810/0001-04"


```

Contributing
----
Pull requests são bem vindos. 
Certifique-se de atualizar os testes apropriadamente.

Licença
----
[MIT](https://choosealicense.com/licenses/mit/)