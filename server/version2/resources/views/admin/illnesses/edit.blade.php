@extends('layouts.admin')
@section('title', 'Болезни | Добавление')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Редактировать заболевание</h3>                    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('illnesses.update',['illness'=>$illness->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{ $illness->title }}">
                    </div>                  
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Введите описание">{{ $illness->description }}</textarea>
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