@extends('layouts.admin')
@section('title', 'Список дел')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Информация о делах</h3>                    
        </div>        
        <div class="card-body">
            <a href="{{ route('freedoms.create') }}"><button class="btn btn-primary">Добавить дело</button></a><br><br>
          @if($freedoms->count()>0)  
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>ФИО</th>
              <th>Возраст</th>
              <th>Пол</th>
              <th>Заболевания</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($freedoms as $freedom)
            <tr>           
                {{ $prisoner=$freedom->prisoner(); }} 
              <td>{{ $prisoner->family }} {{ $prisoner->name }} {{ $prisoner->patronymic }}</td>
              <td>{{ $prisoner->age }}</td>
              <td>
                  @if($prisoner->gender==1)
                    М
                  @else
                    Ж
                  @endif
              </td>
              <td><?=$prisoner->illness->title ?></td>
              <td>
                  <a href="{{ route('freedom.edit',['freedom'=>$freedom->id]) }}" class="btn btn-info float-left mr-1 btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <form action="{{ route('freedom.destroy',['freedom'=>$freedom->id]) }}" method="post" class="float-left">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены что хотите удалить?')"><i class="fas fa-trash-alt"></i></button>
                  </form>
            </td>              
            </tr>
            @endforeach            
          </table>
          @else
          Вы пока не добавили дела
        </div>        
      </div>
@endsection