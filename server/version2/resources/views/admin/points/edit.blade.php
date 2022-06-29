@extends('layouts.admin')
@section('title', 'Точка | Редактирование')
@section('content')
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Редактировать точку</h3>                    
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-6 col-sm-12">
            <form action="{{ route('points.update',['point'=>$point->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="freedom_id">Дело: {{ $point->freedom->slug }}</label>
                        <input type="hidden" name="freedom_id" value="{{ $point->freedom->id }}">
                        <input type="hidden" name="status" value="{{ $point->status }}">
                    </div>                  
                    <div class="form-group">
                        <label for="startdate">Дата начала</label>
                        <input class="form-control @error('startdate') is-invalid @enderror" name="startdate" id="startdate" placeholder="Дата начала" value={{ $point->startdate }}>
                    </div>
                    <div class="form-group">
                        <label for="enddate">Дата завершения</label>
                        <input class="form-control @error('enddate') is-invalid @enderror" name="enddate" id="enddate" placeholder="Дата завершения" value={{ $point->enddate }}>
                    </div>
                    <div class="form-group">
                        <label>Выберите тип узла</label>
                        <select class="form-control" name="node_id">
                            @foreach($nodes as $node)
                            <option value="{{ $node->id }}" @if ($point->node->id==$node->id) selected @endif>{{ $node->title }}</option>
                            @endforeach
                        </select>                        
                    </div>                                        
                    <div class="form-group">
                        <label for="info">Информация</label>
                        <textarea class="form-control" id="info" name="info" rows="3" placeholder="Информация">{{ $point->info }}</textarea>
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