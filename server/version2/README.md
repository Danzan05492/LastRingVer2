---------------------- Next
Проверка на доступ к моделям (мб через middleware?)
посмотреть что такое мутаторы
----------------------TODO
Софт удаление для Карточек?
В методах типа edit/show и тд  передаётся id объекта, как проверять и перекидывать если такого объекта нет?
Для годности к армии нужна категория?
При генерации календаря нужно удалять старое? и вообще не давать генерировать если есть данные?
Не давать менять УДО если оно залочено - на уровне рулзов

---------------------- Инфо
При валидации создаём Request (Управление категориями часть 2. 13-19) - правила валидации + проверка авторизации!

php artisan make:controller Admin/NoteController -r - создание ресурса
php artisan make:request StoreNote - Реквест для модели
php artisan make:model Note -m  - Модель и миграция
php artisan migrate:refresh - обновление базы
php artisan db:seed - вытащить все данные из дефолтного сида
php artisan migrate:refresh --seed - обновить миграции и вытащить сиды

Валидация дат:
https://www.magutti.com/blog/lavavel-date-validation

Материалы по REST
https://maxyc.ru/programming/laravel/restful-api-laravel/
https://habr.com/ru/post/441946/
--------------------- Вопросы
ВАЖНО: как добавить дополнительный рут для ресурса? 
    https://stackoverflow.com/questions/16661292/add-new-methods-to-a-resource-controller-in-laravel   
    https://laravel.com/docs/9.x/controllers
Ответ: пока добавил через GET параметр