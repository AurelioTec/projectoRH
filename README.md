## Descrição

Sistema básico de gestão de RH.

## Requisitos

-   PHP 8.2 ou superior
-   MySQL 8 ou superior
-   Composer

## Como rodar o projeto baixado

Duplicar o arquivo ".env.example" e renomear para ".env".<br>
Alterar no arquivo .env as credenciais do banco de dados<br>

Instalar as dependências do PHP

```
composer install
```

Gerar a chave no arquivo .env

```
php artisan key:generate
```

Executar as migration

```
php artisan migrate
```

Iniciar o projeto criado com Laravel

```
php artisan serve
```
