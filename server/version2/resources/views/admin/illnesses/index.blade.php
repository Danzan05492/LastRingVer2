@extends('layouts.admin')
@section('title', 'Список болезней')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Болезни</h3>                    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{ route('illnesses.create') }}"><button class="btn btn-primary">Добавить Болезнь</button></a><br><br>
          @if($illnesses->count()>0)  
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Название</th>              
              <th>Описание</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($illnesses as $illness)
            <tr>            
              <td>{{ $illness->title }}</td>
              <td>{{ $illness->description }}</td>              
              <td>
                  <a href="{{ route('illnesses.edit',['illness'=>$illness->id]) }}" class="btn btn-info float-left mr-1 btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <form action="{{ route('illnesses.destroy',['illness'=>$illness->id]) }}" method="post" class="float-left">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены что хотите удалить?')"><i class="fas fa-trash-alt"></i></button>
                  </form>
            </td>
              
            </tr>
            @endforeach
            
          </table>
          @else
          Вы пока не добавили заболеваний
          @endif
        </div>
        <!-- /.card-body -->
      </div>

@endsection