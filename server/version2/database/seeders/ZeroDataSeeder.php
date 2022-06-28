<?php
/**
 * Класс с первичной заливкой данных
 */
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Illness;
use App\Models\User;
use App\Models\Note;
class ZeroDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Дефолтный юзер
        User::create(array(
            'name'=>'Коровов',
            'email'=>'cow@bsu.ru',
            'password'=>'12345678'
        ));
        //Справочник болезней
        Illness::create(array(
            'title'=>'Здоров',
            'description'=>'Не требуется обращение к врачу'
        ));
        Illness::create(array(
            'title'=>'Болен',
            'description'=>'Требуется обращение к врачу'
        ));
        //Узлы по умолчанию
        //Узлы. Подготовка
        Note::create(array(
            'title'=>'Шаг 1. Проверка данных',
            'description'=>'Проверьте данные, в случае если есть неястности готовьте представление',
            'type'=>Note::INFORMATION,
            'default_length'=>0,
            'content'=>'',
            'slug'=>'preparation_step_1'
        ));
        Note::create(array(
            'title'=>'Шаг 2. Оповещаем суд',
            'description'=>'Направление в суд извещения о принятии к исполнению постановления',
            'type'=>Note::INFORMATION,
            'default_length'=>0,
            'content'=>'',
            'slug'=>'preparation_step_2'
        ));
        Note::create(array(
            'title'=>'Шаг 3. УИИ',
            'description'=>'Направляем сообщение в УИИ',
            'type'=>Note::INFORMATION,
            'default_length'=>0,
            'content'=>'Если состоял на учёте в УИИ, то уведомляем УИИ о получении дела. Если подлежит административному надзору то направляем сообщение',
            'slug'=>'preparation_step_3'
        ));
        Note::create(array(
            'title'=>'Шаг 3.1 Военкомат',
            'description'=>'Уведомляем военкомат',
            'type'=>Note::INFORMATION,
            'default_length'=>0,
            'content'=>'Для тех кто военнообязанный отправляем уведомление',
            'slug'=>'preparation_step_3_1'
        ));
        Note::create(array(
            'title'=>'Шаг 4. Уведомление осужденного',
            'description'=>'Уведомляем осужденного',
            'type'=>Note::BREAKPOINT,
            'default_length'=>10,
            'content'=>'Осужденный должен явиться в срок - 10 дней',
            'slug'=>'preparation_step_4'
        ));
        Note::create(array(
            'title'=>'Шаг 5. Первая беседа',
            'description'=>'Беседуем с осужденным',
            'type'=>Note::INFORMATION,
            'default_length'=>0,
            'content'=>'Проведение первоначальной беседы, проверка документов, фотографирование, разъяснений УДО, последствий совершения нового преступления, порядок исполнения возложенных обязанностей',
            'slug'=>'preparation_step_5'
        ));
        Note::create(array(
            'title'=>'Шаг 6. Памятка для осужденного',
            'description'=>'Составление подписки, выдача осужденному памятки',
            'type'=>Note::INFORMATION,
            'default_length'=>0,
            'content'=>'',
            'slug'=>'preparation_step_6'
        ));
        Note::create(array(
            'title'=>'Шаг 6.1 Направление на лечение',
            'description'=>'Если имеется обязанность пройти курс лечения от заболевания, то выдается направление',
            'type'=>Note::INFORMATION,
            'default_length'=>0,
            'content'=>'',
            'slug'=>'preparation_step_6_1'
        ));
        //Узлы. Контроль 
        Note::create(array(
            'title'=>'Плановая Проверка',
            'description'=>'Проверка по месту жительства осужденного соблюдение осужденным общественного порядка и исполнение им возложенных судом обязанностей',
            'type'=>Note::BREAKPOINT,
            'default_length'=>90,
            'content'=>'',
            'slug'=>'control_check'
        ));
        //Узлы. Завершение
        Note::create(array(
            'title'=>'Снятие с учёта',
            'description'=>'Снятие с учёта',
            'type'=>Note::INFORMATION,
            'default_length'=>0,
            'content'=>'',
            'slug'=>'ending'
        ));
    }
}
