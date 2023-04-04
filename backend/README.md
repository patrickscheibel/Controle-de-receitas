# Backend

## Instalação das tecnologias utilizadas
### PHP
```sh
apt install php php-xml php-mysql
```

### Composer

```sh
apt install composer
```

### Docker Compose(Opcional)

```sh
apt install docker-compose
```

## Instalar dependências

```sh
composer install
```
Utilizei as migrations para o banco de dados, mas caso seja necessário o script com o sql está na pasta database.

### Criar e executar o banco pelo docker-compose(Opcional)

```sh
docker-compose up -d
```
### Executar as migrations(Opcional)

```sh
php artisan migrate
```

### Executar o sistema
```sh
php artisan serve
```

