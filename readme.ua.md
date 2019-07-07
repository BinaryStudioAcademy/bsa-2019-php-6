# Binary Studio Academy 2019 PHP

## Домашнє завдання Laravel introduction

### Вимоги
Ознайомитися з фреймворком, попрацювати з сервіс-контейнером та архітектурою в цілому. Ознайомитися з механізмом ініціалізації(bootstrap) та обробки запита користувача. Ознайомитись з тестовим середовищем в Laravel.

### Встановлення
Встановлення показане в робочому середовищі OS Linux:
```bash
git clone git@github.com:BinaryStudioAcademy/bsa-2019-php-6.git
cd bsa-2019-php-6
composer install
cp .env.example .env
php artisan key:generate
```

### Завдання

#### Завдання 1
* Реалізувати клас `Product`.
* Реалізувати клас `ProductGenerator`.
* Реалізувати інтерфейс `ProductRepositoryInterface` та зареєструвати в сервіс контейнері Laravel.
* Реалізувати клас `GetAllProductsAction` та повернути `GetAllProductsResponse` зі всіма товарами.
* Реалізувати клас `GetMostPopularProductAction` та повернути `GetMostPopularProductResponse` з найпопулярнішим товаром.
* Реалізувати клас `GetCheapestProductsAction` та повернути `GetCheapestProductsResponse` з трьома найдешевшими товарами, відсортованими за зростанням ціни.

#### Завдання 2
* Реалізувати клас `ProductArrayPresenter`.
* Реалізувати маршрут `/api/products` в файлі `routes/api.php`, по якому можна отримати список всіх товарів у форматі json.
* Реалізувати маршрут `/api/products/popular` в файлі `routes/api.php`, по якому можна отримати найпопулярніший товар у форматі json.
* Реалізувати маршрут `/products/cheap` в файлі `routes/web.php`, по якому можна отримати найдешевші товари та відрендерити їх у view `cheap_products.blade.php`.

### Перевірка
Своє рішення можна перевірити запустивши тести PHPUnit.

Всі тести:
```bash
./vendor/bin/phpunit
```
Тести для кожного завдання окремо:
```bash
./vendor/bin/phpunit --testsuite task1
```
