----------------------TODO
ВАЖНО: как добавить дополнительный рут для ресурса? 
    https://stackoverflow.com/questions/16661292/add-new-methods-to-a-resource-controller-in-laravel   
    https://laravel.com/docs/9.x/controllers
    Добавить в УДО метку - сгенерировано или нет? 
Отображение: Нормальное задание дат для freedom и condemned (Элемент календарь)
Ошибки валидации в форме добавления заключённого
Редактирование карточек только по юзеру (https://laravel.com/docs/9.x/validation#form-request-validation)
Софт удаление для Карточек?
Допилить валидацию для карточек

---------------------- Инфо
При валидации создаём Request (Управление категориями часть 2. 13-19) - правила валидации + проверка авторизации!


php artisan make:controller Admin/NoteController -r - создание ресурса
php artisan make:request StoreNote - Реквест для модели
php artisan make:model Note -m  - Модель и миграция
php artisan migrate:refresh - обновление базы
php artisan db:seed - вытащить все данные из дефолтного сида
php artisan migrate:refresh --seed - обновить миграции и вытащить сиды