# api-lravel

Настройка
------------------
* Выполнить миграцию для создания таблиц:
```
php artisan migrate
```
* Для запуска задач в crontab добавить:
```
* * * * * php /path/to/artisan schedule:run >>/dev/null 2>&1
```
* endpoints:
```
Стурктура: /api/v1/structure?name='test', где name - имя структуры;
Источники данных: /api/v1/source;
Данные: /api/v1/data;
```
* авторизация:
```
Для авторизации передать header:
Authorization: Bearer 123;
```
