## Документация

### Установка
    composer install

    Настроить любой web сервер (nginx, apatch, xampp ...) до index.php расположенного в public

### Настройка
    1. в файле /config/database.php расположены настройки подключения базы данных
    2. Маршруты создаються в папке routes/web.php по аналогии с laravel
    3. Модели создаються в папке app/Models, класс наследуеться от DB и указываеться protected $table
    4. Контроллеры создаються в папке app/Http/Controllers
    5. Реквесты создаються в папке app/Http/Requests, наследуються от RequestValidator в protected $fillable указываються обязательные поля запроса. Метод check можеть быть переопределенно для дополнения правил валидации

### Методы моделей
Методы моделей такие же как у laravel. Можно использовать подряд

    
    insert  - принимает массив для добавления
    update  - принимает массив для обновления
    where   - принимает имя колонки, значение, сепаратор (по умолчанию =)
    orWhere - принимает тоже самое что where
    select  - принимает строку, с перечисленными полями
    orderBy - принимает колонку и вид сортировки (по умолчанию ASC)
    limit   - принимает кол-во эллементов и offcet
    delete  - удаление
    first   - получить одну запись, принимает PDO mode (по умолчанию PDO::FETCH_OBJ)
    get     - получить массив записей, принимает PDO mode (по умолчанию PDO::FETCH_OBJ)
    

    Примеры

    (new Model)->where('rating', 100, '>')->where('rating', 1000, '<')->select('id, rating')->orderBy('id', 'DESC')->limit(5)->get();
    
    (new Model)->insert([
        'name' => 'Test',
        'rating' => 100
    ]);
    
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
    