@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Информация об осужденных</h3>          
          
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{ route('condemneds.create') }}"><button class="btn btn-primary">Добавить осужденного</button></a><br><br>
          @if($prisoners->count()>0)  
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
            @foreach($prisoners as $prisoner)
            <tr>            
              <td>{{ $prisoner->family }} {{ $prisoner->name }} {{ $prisoner->patronymic }}</td>
              <td>{{ $prisoner->age }}</td>
              <td>
                  @if($prisoner->gender==1)
                    М
                    @else
                    Ж
                    @endif
              </td>
              <td>{{ $prisoner->illness }}</td>
              <td>
                  <a href="{{ route('condemneds.edit',['condemned'=>$prisoner->id]) }}" class="btn btn-info float-left mr-1 btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <form action="{{ route('condemneds.destroy',['condemned'=>$prisoner->id]) }}" method="post" class="float-left">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены что хотите удалить?')"><i class="fas fa-trash-alt"></i></button>
                  </form>
            </td>
              
            </tr>
            @endforeach
            
          </table>
          @else
          Вы пока не добавили данных осужденных
          @endif
        </div>
        <!-- /.card-body -->
      </div>

@endsection