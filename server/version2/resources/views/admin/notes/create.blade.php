@extends('layouts.admin')
@section('title', 'Узел | Добавление')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Добавить узел</h3>                    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('notes.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Название</label>
                        <input class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Заголовок">
                    </div>                  
                    <div class="form-group">
                        <label>Описание</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="Введите описание"></textarea>
                    </div>                      
                    <div class="form-group">
                        <label>Тип (пока полем)</label>
                        <input class="form-control @error('type') is-invalid @enderror" name="type" id="type" placeholder="Тип">
                    </div>
                    <div class="form-group">
                        <label>Продолжительность в днях (по умолчанию)</label>
                        <input class="form-control @error('default_length') is-invalid @enderror" name="default_length" id="default_length" placeholder="Продолжительность в днях (по умолчанию)">
                    </div>
                    <div class="form-group">
                        <label>Контент</label>
                        <textarea class="form-control" name="content" rows="3" placeholder="Контент"></textarea>
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