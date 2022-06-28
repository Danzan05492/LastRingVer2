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
                          <option value="{{ $condemned->id }}">{{ $condemned->family}} {{ $condemned->name}} {{ $condemned->patronymic}}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Информация</label>
                        <textarea class="form-control" name="info" rows="3" placeholder="Информация"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nick">Краткое название для дела</label>
                        <input class="form-control" name="slug" id="slug" placeholder="Краткое название">
                    </div> 
                    <div class="form-group">
                      <label for="enddate">Дата завершения</label>
                      <input class="form-control" name="enddate" id="enddate" placeholder="Дата завершения">
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