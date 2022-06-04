@extends('layouts.admin')
@section('title', 'Список осужденных | Добавление')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Добавить осужденного</h3>                    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('condemneds.store') }}" method="POST">
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
                        <label for="age">Возраст</label>
                        <input class="form-control" name="age" id="age" placeholder="Возраст">
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
                        <label for="illness_id">Код заболевания</label>
                        <input class="form-control" name="illness_id" id="illness_id" placeholder="Код заболевания" value='0'>
                    </div>
                    <div class="form-group">
                        <label>Информация</label>
                        <textarea class="form-control" name="info" rows="3" placeholder="Enter ..."></textarea>
                      </div>
                      <div class="form-group">
                        <label for="nick">Псевдоним</label>
                        <input class="form-control" name="nick" id="nick" placeholder="Имя">
                    </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection