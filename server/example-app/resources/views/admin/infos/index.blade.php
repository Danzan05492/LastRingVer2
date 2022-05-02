<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Информация') }}
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
                    <a href="{{route('infos.create')}}"><button>Добавить Информацию</button></a>
                    <hr>
                    @if (count($infos))
                    <table style="border-width: 1px;">
                        <tr style="border-width: 1px;">
                            <th>id</th>
                            <th>Название</th>
                            <th>Категория</th>
                            <th>Дата</th>
                        </tr>
                    @foreach($infos  as $info)
                    <tr style="border-width: 1px;">
                        <td>{{$info->id}} </td>
                    <td>{{$info->title}} </td>
                    <td></td>
                    <td>{{$info->created_at}} </td>
                    <td>
                    [<a href="{{route('infos.edit',['info'=>$info->id])}}"> Редактировать</a>]<br>
                    <form action='{{route('infos.destroy',['info'=>$info->id])}}' method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Удалить">
                    </form>
                            </td>
                 
                    @endforeach
                       </table>
                    @else
                        <strong>У вас нет Информации</strong>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
