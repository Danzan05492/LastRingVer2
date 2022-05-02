<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Категории. Редактируем') }}
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
                    <form role="form" method="post" action="{{route('categories.update',['category'=>$category->id])}}">
                        @csrf
                        @method('PUT')
                        <input type="text" name="title" class="@error('title') is-invalid @enderror>" id="title" value="{{$category->title}}">
                        <input type="submit" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>