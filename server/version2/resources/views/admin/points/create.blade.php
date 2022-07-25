@extends('layouts.admin')
@section('title', 'Точка | Добавление')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Добавить точку</h3>                    
        </div>
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('points.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="freedom_id">Дело: {{ $freedom->slug }}</label>
                        <input type="hidden" name="freedom_id" value="{{ $freedom->id }}">
                        <input type="hidden" name="status" value="{{ $default_status }}">
                    </div>                  
                    <div class="form-group">
                        <label for="startdate">Дата начала</label>
                        <input class="form-control @error('startdate') is-invalid @enderror" name="startdate" id="startdate" placeholder="Дата начала" value="{{ old('startdate') }}">
                    </div>
                    <div class="form-group">
                        <label for="enddate">Дата завершения</label>
                        <input class="form-control @error('enddate') is-invalid @enderror" name="enddate" id="enddate" placeholder="Дата завершения" value="{{ old('enddate') }}">
                    </div>
                    <div class="form-group">
                        <label>Выберите тип узла</label>
                        <select class="form-control" name="node_id">
                            @foreach($nodes as $node)
                            <option value="{{ $node->id }}" @if(old('node_id')==$node->id) selected @endif>{{ $node->title }}</option>
                            @endforeach
                        </select>                        
                    </div>                                        
                    <div class="form-group">
                        <label for="info">Информация</label>
                        <textarea class="form-control" id="info" name="info" rows="3" placeholder="Информация">{{ old('info') }}</textarea>
                    </div>   
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection