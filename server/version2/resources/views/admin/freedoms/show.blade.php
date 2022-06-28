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
                <a  href="{{ route('points.create') }}">[Добавить точку]</a>
            </div>
        </div>    
    </div>
</div>
<hr>
<h2 class="m-0">Календарь</h2>
@endsection