## Документация

### Установка
    composer install

    Настроить любой web сервер (nginx, apatch, xampp ...) до index.php расположенного в public

### Настройка
    1. в файле /config/database.php расположены настройки подклчения базы данных
    2. Маршруты создаються в папке routes/web.php по аналогии с laravel
    3. Модели создаються в мамке app/Models, класс наследуеться от DB и указываеться protected $table
    4. Контроллеры создаються в папке app/Http/Controllers
    5. Реквесты создаються в папке app/Http/Requests, наследуються от RequestValidator в protected $fillable указываються обязательные поля запроса. Метод check можеть быть переопределенно для дополнения правил валидации
### API Методы

GET:

    /articles - список записей
        параметры: page (необязательный параметр, по умолчанию страница 1)
        пример: /articles?page=2


    /article/ - получить запись по ID
        параметры: id
        пример: /article/?id=1

    /comments - список комментариев к записи
        параметры: article_id
        пример: /comments?article_id=1


POST:


    /article - добавить запись
        параметры: author_name, description

    /comment - добавить комментарии
        параметры: article_id, author_name, description
    