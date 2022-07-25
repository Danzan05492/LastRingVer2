@extends('layouts.admin')
@section('title', 'Список дел | Добавление')
@section('content')
<div class="col-md-6 col-sm-12">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Добавить дело</h3>                    
        </div>
        @if(count($condemneds)>0)
            <form action="{{ route('freedoms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">                    
                    <div class="form-group">
                        <label for="condemned_id">Арестант</label>
                        <select class="form-control" id="condemned_id" name="condemned_id">
                        @foreach ($condemneds as $condemned)
                          <option value="{{ $condemned->id }}" @if(old('condemned_id')==$condemned->id) selected @endif>{{ $condemned->family}} {{ $condemned->name}} {{ $condemned->patronymic}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Информация</label>
                        <textarea class="form-control" name="info" rows="3" placeholder="Информация">{{ old('info') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="nick">Краткое название для дела</label>
                        <input class="form-control" name="slug" id="slug" placeholder="Краткое название" value="{{ old('slug') }}">
                    </div> 
                    <div class="form-group">
                      <label for="startdate">Дата начала</label>
                      <div class="input-group date dateField" id="startdate" data-target-input="nearest" >
                          <input type="text" name="startdate" class="form-control datetimepicker-input" data-target="#startdate" placeholder="Дата начала" value="{{ old('startdate') }}"/>
                          <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>  
                    <div class="form-group">
                      <label for="enddate">Дата завершения</label>
                      <div class="input-group date dateField" id="enddate" data-target-input="nearest" >
                          <input type="text" name="enddate" class="form-control datetimepicker-input" data-target="#enddate" placeholder="Дата завершения" value="{{ old('enddate') }}"/>
                          <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>                    
                </div>    
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
              </form>
        @else
        <div class="card-body">   
              Вы не добавили осужденных!
        </div>
        @endif
        </div>
</div>
@endsection
@section('scripts')
<script>
$('.dateField').datetimepicker({
  format: 'YYYY-MM-DD hh:mm',
  icons: { time: 'far fa-clock'}
});
</script>
@endsection