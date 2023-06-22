# Laravel PHP Framework - Teste Liberfly



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
$ php artisan serve
$ php artisan db:seed #para gerar os seeders, dados de teste
```
Acesssar pela url: http://localhost:8000/




