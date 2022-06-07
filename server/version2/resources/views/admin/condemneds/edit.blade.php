@extends('layouts.admin')
@section('title', 'Список осужденных | Редактирование')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Редактирование осужденного</h3>                    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('condemneds.update',['condemned'=>$condemned->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="family">Фамилия</label>
                        <input class="form-control @error('family') is-invalid @enderror" name="family" id="family" value="{{ $condemned->family }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input class="form-control" name="name" id="name" placeholder="Имя" value="{{ $condemned->name }}">
                    </div>
                    <div class="form-group">
                        <label for="patronymic">Отчество</label>
                        <input class="form-control" name="patronymic" id="patronymic" placeholder="Отчество" value="{{ $condemned->patronymic }}">
                    </div>
                    <div class="form-group">
                        <label for="age">Возраст</label>
                        <input class="form-control" name="age" id="age" placeholder="Возраст" value="{{ $condemned->age }}">
                    </div>
                    <div class="form-group">
                        <label>Пол</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value=1 @if ($condemned->gender==1) checked @endif>
                          <label class="form-check-label">Мужской</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value=2 @if ($condemned->gender==2) checked @endif>
                          <label class="form-check-label">Женский</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="illness_id">Код заболевания</label>
                        <select class="form-control" id="illness_id" name="illness_id">
                          @foreach ($illnesses as $key=>$value)
                            <option value="{{ $key }}" @if ($key==$condemned->illness_id) selected @endif>{{ $value }}</option>
                          @endforeach
                          </select>
                    </div>
                    <div class="form-group">
                        <label>Информация</label>
                        <textarea class="form-control" name="info" rows="3">{{ $condemned->info }}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="nick">Псевдоним</label>
                        <input class="form-control" name="nick" id="nick" placeholder="Имя" value="{{ $condemned->nick }}">
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
                    <img src="/storage/{{ $condemned->thumbnail}}">
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