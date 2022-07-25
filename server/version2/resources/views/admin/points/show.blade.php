@extends('layouts.admin')
@section('title', 'Точка | Информация')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-info">
            <div class="card-header">
            <h3 class="card-title">Информация о точке</h3>                    
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="col-md-6 col-sm-12">
                
                    <div class="card-body">                             
                        <div class="form-group">
                            <label for="startdate">Дата начала</label>
                            <p id="startdate">{{ $point->startdate }}</p>
                        </div>
                        <div class="form-group">
                            <label for="enddate">Дата завершения</label>
                            <p id="enddate">{{ $point->enddate }}</p>
                        </div>
                        <div class="form-group">
                            <label for="enddate">Выберите тип узла</label>
                            <p id="enddate">{{ $point->node->title }}</p>
                        </div>      
                        @if ($point->info!="")                                  
                        <div class="form-group">
                            <label for="info">Информация</label>
                            <p id="info">{{ $point->info }}</p>
                        </div>   
                        @endif
                    </div>
                
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Информация о деле</h3>                    
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
                    <div class="form-group">
                        <label>Дата начала</label>
                        <p>{{ $point->freedom->startdate }}</p>
                    </div>
                    <div class="form-group">
                        <label>Дата завершения</label>
                        <p>{{ $point->freedom->enddate }}</p>
                    </div>
                    <div class="form-group">
                        <label>Количество нарушений</label>
                        <p>? (тут число и ссылка если не ноль!)</p>
                    </div>
                                   
                    @if ($point->freedom->info!="")
                    <div class="form-group">
                        <label>Дополнительная информация</label>
                        <p>{{ $point->freedom->info }}</p>
                    </div>
                    @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card card-warning">
            <div class="card-header">
              <h3 class="card-title">Информация о деле</h3>                    
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
                    <div class="form-group">
                        <label>ФИО (псевдоним)</label>
                        <p>{{ $point->freedom->condemned->family }} {{ $point->freedom->condemned->name }} {{ $point->freedom->condemned->patronymic }} ({{ $point->freedom->condemned->nick }})</p>
                    </div>
                    <div class="form-group">
                        <label>Дата рождения</label>
                        <p>{{ $point->freedom->condemned->getBirthday() }} ({{ $point->freedom->condemned->getAge() }})</p>
                    </div>
                    <div class="form-group">
                        <label>Пол</label>
                        <p>@if($point->freedom->condemned->gender==1) М @else Ж @endif</p>
                    </div>
                       
                    <div class="form-group">
                        <label>Здоровье</label>
                        <p>{{ $point->freedom->condemned->illness->title }}</p>
                    </div>

                    @if ($point->freedom->info!="")
                    <div class="form-group">
                        <label>Дополнительная информация</label>
                        <p>{{ $point->freedom->info }}</p>
                    </div>
                    @endif
                    @if ($point->freedom->condemned->info!="")
                    <div class="form-group">
                        <label>Дополнительная информация</label>
                        <p>{{ $point->freedom->condemned->info }}</p>
                    </div>
                    @endif                                           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection