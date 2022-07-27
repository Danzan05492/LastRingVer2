---------------------- Next
работа с токенами:
    https://laravel.su/docs/8.x/sanctum#spa-authentication
    https://overcoder.net/q/2994979/%D0%BA%D0%B0%D0%BA-%D0%BF%D0%BE%D0%BB%D1%83%D1%87%D0%B8%D1%82%D1%8C-%D1%82%D0%B5%D0%BA%D1%83%D1%89%D0%B5%D0%B3%D0%BE-%D0%BF%D0%BE%D0%BB%D1%8C%D0%B7%D0%BE%D0%B2%D0%B0%D1%82%D0%B5%D0%BB%D1%8F-%D0%B2-laravel-api-%D0%B8%D1%81%D0%BF%D0%BE%D0%BB%D1%8C%D0%B7%D1%83%D1%8F-passport
    https://overcoder.net/q/4946/%D0%B2%D1%8B%D0%BF%D0%BE%D0%BB%D0%BD%D0%B5%D0%BD%D0%B8%D0%B5-http-%D0%B7%D0%B0%D0%BF%D1%80%D0%BE%D1%81%D0%BE%D0%B2-%D0%BE%D1%82-laravel-%D0%BA-%D0%B2%D0%BD%D0%B5%D1%88%D0%BD%D0%B5%D0%BC%D1%83-api
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

Проверка на доступ к моделям (через политики) 
- Используем политики https://laravel.demiart.ru/laravel-policy/
- Вешаем на ресурсы https://laracasts.com/discuss/channels/laravel/how-to-apply-policy-to-a-resource-controller?page=1
    проблема этого метода в том, что он нормально не работает изза косяка ларавеля: https://github.com/laravel/framework/issues/32409
    поэтому юзаем простую проверку в контроллере

Для внутренних запросов AJAX проще сделать метод и воспользоваться Ресурсами которые генерируются для API
--------------------- Вопросы
ВАЖНО: как добавить дополнительный рут для ресурса? 
    https://stackoverflow.com/questions/16661292/add-new-methods-to-a-resource-controller-in-laravel   
    https://laravel.com/docs/9.x/controllers
Ответ: пока добавил через GET параметр