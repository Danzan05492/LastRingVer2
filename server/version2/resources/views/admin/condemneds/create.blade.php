@extends('layouts.admin')
@section('title', 'Список осужденных | Добавление')
@section('content')
<div class="col-md-6 col-sm-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Добавить осужденного</h3>                    
        </div>
        <!-- /.card-header -->
            <form action="{{ route('condemneds.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="family">Фамилия</label>
                        <input class="form-control @error('family') is-invalid @enderror" name="family" id="family" placeholder="Фамилия">
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input class="form-control" name="name" id="name" placeholder="Имя">
                    </div>
                    <div class="form-group">
                        <label for="patronymic">Отчество</label>
                        <input class="form-control" name="patronymic" id="patronymic" placeholder="Отчество">
                    </div>
                    <div class="form-group">
                        <label for="birthday">Дата рождения</label>
                        <input class="form-control" name="birthday" id="birthday" placeholder="Дата рождения">
                    </div>
                    <div class="form-group">
                      <label>Дата рождения:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Пол</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value=1>
                          <label class="form-check-label">Мужской</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value=2>
                          <label class="form-check-label">Женский</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="illness_id">Заболевание</label>
                        <select class="form-control" id="illness_id" name="illness_id">
                        @foreach ($illnesses as $key=>$value)
                          <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Информация</label>
                        <textarea class="form-control" name="info" rows="3" placeholder="Enter ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nick">Псевдоним</label>
                        <input class="form-control" name="nick" id="nick" placeholder="Имя">
                    </div>  
                    <div class="form-group">
                      <label for="thumbnail">Изображение</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="thumbnail" class="custom-file-input" id="thumbnail" >
                          <label class="custom-file-label" for="thumbnail">Выберите файл</label>
                        </div>                        
                      </div>
                    </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
              </form>

        </div>
    </div>
@endsection