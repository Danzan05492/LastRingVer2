@extends('layouts.admin')
@section('title', 'Дело: '.$freedom->slug)
@section('content')
<div class="row">
    <div class="col-4">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Детали дела</h3>
            </div>
            <div class="card-body">
                <p><strong>Дата начала</strong>: {{ $freedom->startdate }}</p>
                <p><strong>Дата завершения</strong>: {{ $freedom->enddate }}</p>
                <p><strong>Количество нарушений</strong>: ? (тут число и ссылка если не ноль!)</p>
                @if ($freedom->info!="")
                    <hr>
                    <strong>Дополнительная информация</strong><br>
                    {{ $freedom->info }}
                @endif
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Информация об осужденном</h3>
            </div>
            <div class="card-body">
                <p><strong>ФИО (псевдоним)</strong>: {{ $condemned->family }} {{ $condemned->name }} {{ $condemned->patronymic }} ({{ $condemned->nick }})</p>
                <p><strong>Дата рождения</strong>: {{ $condemned->getBirthday() }} <strong>Возраст</strong>: {{ $condemned->getAge() }}</p>
                <p><strong>Пол</strong>: @if($condemned->gender==1) М @else Ж @endif</p>
                <p><strong>Здоровье</strong>: {{ $condemned->illness->title }}</p>
                @if ($condemned->info!="")
                    <hr>
                    <strong>Дополнительная информация</strong><br>
                    {{ $condemned->info }}
                @endif
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Операции</h3>
            </div>
            <div class="card-body">
                [<a href="{{ route('points.create',['freedom_id'=>$freedom->id]) }}">Добавить точку</a>]<br>
                [<a href="{{ route('freedoms.calendar-form',['freedom'=>$freedom->id]) }}">Сгенерировать календарь</a>]<br>
                @if ($freedom->status==$freedom::EDITABLE)
                    [<a href="{{ route('freedoms.calendar-change-status',['freedom'=>$freedom->id,'status'=>$freedom::LOCKED]) }}">Заблокировать дело</a>]
                @else
                    [<a href="{{ route('freedoms.calendar-change-status',['freedom'=>$freedom->id,'status'=>$freedom::EDITABLE]) }}">Разблокировать</a>]
                @endif
                <br>
                [<a href="{{ route('freedoms.calendar-change-status',['freedom'=>$freedom->id,'status'=>$freedom::FINISHED]) }}">Закрыть дело</a>]
            </div>
        </div>
    </div>
</div>
<hr>
<h2 class="m-0">Календарь</h2>
@if ($points->count())
    <div class="row">
    @foreach ($points as $point)
            <div class="card card-info" style="margin: 4px;">
                <div class="card-header" style="background-color: #696969">
                    <h3 class="card-title">{{ $point->node->title }}</h3>
                </div>
                <div class="card-body">
                    Тип точки: {{ $point->node->getType() }}<br>
                    Дата начала: {{ $point->getDate("start") }}<br>
                    Дата завершения: {{ $point->getDate("end") }}<br>
                    Статус: {{ $point->getStatus() }}<br>
                    <hr>
                    <a href="{{ route('points.edit',['point'=>$point->id]) }}" class="btn btn-info float-right btn-sm" style="margin: 2px"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ route('points.destroy',['point'=>$point->id]) }}" method="post" class="float-right">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" style="margin: 2px" onclick="return confirm('Вы уверены что хотите удалить?')" ><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
    @endforeach
    </div>
@else
    Пока нет точек в календаре
@endif
@endsection
