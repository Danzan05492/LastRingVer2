@extends('layouts.admin')
@section('title', 'Болезни | Добавление')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Добавить заболевание</h3>                    
        </div>        
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('illnesses.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Заголовок" value="{{ old('title') }}">
                    </div>                  
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Введите описание">{{ old('description') }}</textarea>
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