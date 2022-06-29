@extends('layouts.admin')
@section('title', 'Список узлов')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Узлы</h3>                    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <a href="{{ route('nodes.create') }}"><button class="btn btn-primary">Добавить Узел</button></a><br><br>
          @if($nodes->count()>0)  
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Название</th>              
              <th>Описание</th>
              <th>Тип</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($nodes as $node)
            <tr>            
              <td>{{ $node->title }}</td>
              <td>{{ $node->description }}</td>              
              <td>{{ $types[$node->type] }}</td>              
              <td>
                  <a href="{{ route('nodes.edit',['node'=>$node->id]) }}" class="btn btn-info float-left mr-1 btn-sm"><i class="fas fa-pencil-alt"></i></a>
                  <form action="{{ route('nodes.destroy',['node'=>$node->id]) }}" method="post" class="float-left">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Вы уверены что хотите удалить?')"><i class="fas fa-trash-alt"></i></button>
                  </form>
            </td>
              
            </tr>
            @endforeach
            
          </table>
          @else
          Вы пока не добавили узлов
          @endif
        </div>
        <!-- /.card-body -->
      </div>

@endsection