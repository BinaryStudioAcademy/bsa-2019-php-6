# Binary Studio Academy 2019 PHP 2019

## Домашнее задание Laravel introduction

### Требования
Ознакомиться с фреймворком, поработать с сервис-контейнером и архитектурой в целом. Ознакомиться с механизмом инициализации(bootstrap) и обработки реквеста пользователя. Ознакомиться с тестовым окружением в Laravel.

### Установка
Установка показана в рабочем окружении OS Linux:
```bash
git clone https://github.com/BinaryStudioAcademy/bsa-2019-php-laravel-general.git
cd bsa-2019-php-laravel-general
composer install
cp .env.example .env
php artisan key:generate
```

### Задания

#### Задание 1
* Реализовать класс `Product`.
* Реализовать класс `ProductGenerator`.
* Реализовать класс `ProductRepositoryInterface` и зарегистрировать в сервис контейнере Laravel.
* Реализовать класс `Product/GetAllAction` и вернуть `Product/GetAllResponse` со всеми товарами.
* Реализовать класс `Product/GetCheapestAction` и вернуть 3 наиболее дешевых товара, отсортированных по возростанию цены.
* Реализовать класс `Product/GetMostPopularAction` и вернуть 3 наиболее популярных товара, отсортированных по убыванию рейтинга.

#### Задание 2
* Реализовать класс `ProductArrayPresenter`.
* Реализовать маршрут `/api/products` в файле `routes/api.php`, по которому можно получить список всех товаров в формате json.
* Реализовать маршрут `/api/products/cheap` в файле `routes/api.php`, по которому можно получить наиболее дешевые товары в формате json.
* Реализовать маршрут `/products/popular` в файле `routes/web.php`, по которому можно получить наиболее популярные товары и отрендерить их во view `popular_products.blade.php`.

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