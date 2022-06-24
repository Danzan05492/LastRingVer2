@extends('layouts.admin')
@section('title', 'Узлы | Редактирование')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Редактировать узел</h3>                    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('notes.update',['note'=>$note->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Заголовок" value="{{ $note->title }}">
                    </div>                  
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Введите описание">{{ $note->description }}</textarea>
                    </div>                      
                    <div class="form-group">
                        <label>Тип (пока полем)</label>
                        <input class="form-control @error('type') is-invalid @enderror" name="type" id="type" placeholder="Тип" value="{{ $note->type }}">
                    </div>
                    <div class="form-group">
                        <label>Продолжительность в днях (по умолчанию)</label>
                        <input class="form-control @error('default_length') is-invalid @enderror" name="default_length" id="default_length" placeholder="Продолжительность в днях (по умолчанию)" value="{{ $note->default_length }}">
                    </div>
                    <div class="form-group">
                        <label>Контент</label>
                        <textarea class="form-control" name="content" rows="3" placeholder="Контент">{{ $note->content }}</textarea>
                    </div>                     
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Обновить</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection