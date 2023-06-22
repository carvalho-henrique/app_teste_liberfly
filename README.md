# Laravel API RESTful



## Para rodar este projeto
Criar database no mysql
```bash
create database liberfly;
```

```bash
$ git clone https://github.com/carvalho-henrique/app_teste_liberfly.git
$ cd app_teste_liberfly
$ composer install
$ cp .env.example .env
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan db:seed #para gerar os seeders, dados de teste
$ php artisan vendor:publish --provider "L5Swagger\L5SwaggerServiceProvider" #para gerar documentacao
$ php artisan l5-swagger:generate
$ php artisan serve
```
Usuario de teste
email: teste@teste.com
senha: 1234

Acesssar pela url: http://localhost:8000/
Acesssar documentacao: http://localhost:8000/api/documentation/




