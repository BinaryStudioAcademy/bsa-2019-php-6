# Binary Studio Academy 2019 PHP

## Домашнее задание Laravel introduction

### Требования
Ознакомиться с фреймворком, поработать с сервис-контейнером и архитектурой в целом. Ознакомиться с механизмом инициализации(bootstrap) и обработки реквеста пользователя. Ознакомиться с тестовым окружением в Laravel.

### Установка
Установка показана в рабочем окружении OS Linux:
```bash
git clone git@github.com:BinaryStudioAcademy/bsa-2019-php-6.git
cd bsa-2019-php-6
composer install
cp .env.example .env
php artisan key:generate
```

### Задания

#### Задание 1
* Реализовать класс `Product`.
* Реализовать класс `ProductGenerator`.
* Реализовать интерфейс `ProductRepositoryInterface` и зарегистрировать в сервис контейнере Laravel.
* Реализовать класс `GetAllProductsAction` и вернуть `GetAllProductsResponse` со всеми товарами.
* Реализовать класс `GetMostPopularProductAction` и вернуть `GetMostPopularProductResponse` c наиболее популярным товаром.
* Реализовать класс `GetCheapestProductsAction` и вернуть `GetCheapestProductsResponse` с 3-мя наиболее дешевыми товарами, отсортированными по возрастанию цены.

#### Задание 2
* Реализовать класс `ProductArrayPresenter`.
* Реализовать маршрут `/api/products` в файле `routes/api.php`, по которому можно получить список всех товаров в формате json.
* Реализовать маршрут `/api/products/popular` в файле `routes/api.php`, по которому можно получить наиболее популярный товар в формате json.
* Реализовать маршрут `/products/cheap` в файле `routes/web.php`, по которому можно получить наиболее дешевые товары и отрендерить их во view `cheap_products.blade.php`.

### Проверка
Свои решения можно проверить запустив тесты PHPUnit.

Все тесты:
```bash
./vendor/bin/phpunit
```
Или тест для каждого задания отдельно:
```bash
./vendor/bin/phpunit --testsuite task1
```

### Docker

```
cp .env.example .env
docker-compose up -d
docker-compose run --rm composer install
docker-compose exec php php artisan key:generate
docker-compose exec php ./vendor/bin/phpunit
```
