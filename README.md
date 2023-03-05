##Документация

###Установка
    composer install

    Настроить любой web сервер (nginx, apatch, xampp ...) до index.php расположенного в public

###API Методы

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
    