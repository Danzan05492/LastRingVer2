@extends('layouts.admin')
@section('title', 'Узлы | Редактирование')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Редактировать узел</h3>                    
        </div>        
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('nodes.update',['node'=>$node->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Заголовок" value="{{ $node->title }}">
                    </div>                  
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Введите описание">{{ $node->description }}</textarea>
                    </div>                      
                    <div class="form-group">
                        <label>Тип</label>
                        <select class="form-control" name="type">
                            @foreach($types as $key=>$value)
                            <option value="{{ $key}}" @if ($key==$node->type) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Продолжительность в днях (по умолчанию)</label>
                        <input class="form-control @error('default_length') is-invalid @enderror" name="default_length" id="default_length" placeholder="Продолжительность в днях (по умолчанию)" value="{{ $node->default_length }}">
                    </div>
                    <div class="form-group">
                        <label>Контент</label>
                        <textarea class="form-control" name="content" rows="3" placeholder="Контент">{{ $node->content }}</textarea>
                    </div>                     
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Обновить</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection