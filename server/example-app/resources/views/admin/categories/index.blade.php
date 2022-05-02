<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Категории') }}
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
        @elseif (session()->has('success'))
        {{session('success')}}
        @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">                    
                    <a href="{{route('categories.create')}}"><button>Добавить категорию</button></a>
                    <hr>
                    @if (count($categories))
                    <table style="border-width: 1px;">
                        <tr style="border-width: 1px;">
                            <th>id</th>
                            <th>Название</th>
                            <th>Slug</th>
                            <th>Операции</th>
                        </tr>
                    @foreach($categories  as $category)
                    <tr style="border-width: 1px;">
                        <td>{{$category->id}} </td>
                    <td>{{$category->title}} </td>
                    <td>{{$category->slug}} </td>
                    <td>
                    [<a href="{{route('categories.edit',['category'=>$category->id])}}"> Редактировать</a>]<br>
                    <form action='{{route('categories.destroy',['category'=>$category->id])}}' method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Удалить">
                    </form>
                            </td>
                 
                    @endforeach
                       </table>
                    @else
                        <strong>У вас нет категорий</strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
