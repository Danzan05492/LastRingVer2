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
                        <input class="form-control @error('family') is-invalid @enderror" name="family" id="family" placeholder="Фамилия" value="{{ old('family') }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <input class="form-control @error('family') is-invalid @enderror" name="name" id="name" placeholder="Имя" value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label for="patronymic">Отчество</label>
                        <input class="form-control" name="patronymic" id="patronymic" placeholder="Отчество" value="{{ old('patronymic') }}">
                    </div>                  
                    <div class="form-group">
                      <label for="birthday">Дата рождения</label>
                      <div class="input-group date dateField" id="birthday" data-target-input="nearest" >
                          <input type="text" name="birthday" class="form-control datetimepicker-input" data-target="#birthday" placeholder="Дата рождения" value="{{ old('birthday') }}"/>
                          <div class="input-group-append" data-target="#birthday" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>                      
                    <div class="form-group">
                        <label>Пол</label>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value=1 {{ old('gender')=="1" ? 'checked='.'"'.'checked'.'"' : '' }}>
                          <label class="form-check-label">Мужской</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gender" value=2 {{ old('gender')=="2" ? 'checked='.'"'.'checked'.'"' : '' }}>
                          <label class="form-check-label">Женский</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="illness_id">Заболевание</label>
                        <select class="form-control" id="illness_id" name="illness_id">
                        @foreach ($illnesses as $key=>$value)
                          <option value="{{ $key }}" @if(old('illness_id')==$key) selected @endif>{{ $value }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Информация</label>
                        <textarea class="form-control" name="info" rows="3" placeholder="Enter ...">{{ old('info') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="nick">Псевдоним</label>
                        <input class="form-control" name="nick" id="nick" placeholder="Имя" value="{{ old('nick') }}">
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
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
              </form>
        </div>
    </div>
@endsection
@section('scripts')
<script>
$('.dateField').datetimepicker({
  format: 'YYYY-MM-DD',
  icons: { time: 'far fa-clock'}
});
</script>
@endsection