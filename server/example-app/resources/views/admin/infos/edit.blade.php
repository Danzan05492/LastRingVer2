<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Инфа. Редактируем') }}
        </h2>
    </x-slot>
    @if ($errors->any())   
       <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">                  
                    @foreach ($errors->all() as $error)
                        {{$error}}<br>
                    @endforeach
              </div>
                </div>
            </div>
        </div> 
    @endif
                  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">                    
                    <form role="form" method="post" action="{{route('infos.update',['info'=>$info->id])}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <strong>Заголовок</strong><br>
                        <input type="text" name="title" class="@error('title') is-invalid @enderror>" id="title" value="{{$info->title}}">
                        <br><br>
                        <strong>Содержание</strong><br>
                        <textarea name="content" rows=5 cols=40>{{$info->content}}</textarea>
                        <br><br>
                        <strong>Категории</strong><br>
                        <select name="categories[]" multiple="multiple">
                            @foreach($categories as $key=>$value)
                                <option value={{$key}} <option value={{$key}} @if (in_array($key,$info->categories->pluck('id')->all())) selected @endif>{{$value}}</option>>{{$value}}</option>
                            @endforeach
                        </select>
                        <br><br>
                        {{$info->thumbnail}}
                        <br>
                        <input type="file" name="thumbnail">
                        <br><br>
                        <input type="submit" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>