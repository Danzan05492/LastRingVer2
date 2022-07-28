@extends('layouts.admin')
@section('title', 'Список пользователей | Редактирование')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Редактирование пользователя</h3>                    
        </div>        
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('users.update',['user'=>$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">                    
                    <div class="form-group">
                        <label for="name">Имя</label>
                        <p class="form-control" name="name" id="name"> {{ $user->name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <p class="form-control" name="email" id="email"> {{ $user->email }}</p>
                    </div>                    
                    <div class="form-group">
                      <label for="user_status">Статус</label>
                      <select class="form-control" name="user_status">
                         @foreach(App\Models\User::$user_roles as $key=>$value)
                            <option value="{{ $key }}" @if ($key==$user->user_status) selected @endif>{{ $value }}</option>
                         @endforeach
                      </select>
                    </div>                     
                </div>              
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Обновить</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@endsection
