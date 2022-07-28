@extends('layouts.admin')
@section('title', 'Список пользователей')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Информация о пользователях</h3>                    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{ route('users.create') }}" ><button class="btn btn-primary">Добавить пользователя</button></a><br><br>
          @if ($users->count()>0)  
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Имя</th>
              <th>email</th>
              <th>Статус</th>              
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
            <tr>            
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              <td>
                  {{ App\Models\User::$user_roles[$user->user_status] }}
              </td>              
              <td>
                  <a href="{{ route('users.edit',['user'=>$user->id]) }}" class="btn btn-info float-left mr-1 btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <form action="{{ route('users.destroy',['user'=>$user->id]) }}" method="post" class="float-left">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены что хотите удалить?')"><i class="fas fa-trash-alt"></i></button>
                  </form>
            </td>
              
            </tr>
            @endforeach            
          </table>
          @else
          В системе не зарегистрировано пользователей
          @endif
        </div>
        <!-- /.card-body -->
      </div>

@endsection