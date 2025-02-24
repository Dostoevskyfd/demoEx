<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Созднание открытки') }}
        </h2>
</x-slot>
<div class="py-12">
<div class="md:container md:mx-auto  justify-between  bg-white min-w-16">
<div class="max-w-7xl sm:px-6 lg:px-8 pt-6 pb-6">
    
    <form action="{{route ('report.store')}}" method="POST" enctype="multipart/form-data">
        @csrf 
         <!-- title -->
         <div class="pb-4">
            <x-input-label for="title" :value="__('Название вашей открытки:')" class="text-xl"/>
            <x-text-input id="title" class="block mt-1 w-96 text-xl" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
         <!-- Name -->
         <div class="pb-4">
            <x-input-label for="category_id" class="text-xl" :value="__('Категории жанра открытки:')" />
            <select name="category_id" id="categorie" class="block mt-1 w-80 text-xl" required>
                @foreach ($categories as $categorie)
                <option value="{{$categorie->id}}">{{$categorie->text}}</option>
                @endforeach

            </select>
        </div>
         <!-- Name -->
         <div class="pb-4">
            <x-input-label for="path_img" :value="__('Загрузить вашу открытку:')"  class="text-xl"/>
            <x-text-input id="path_img" class="block mt-1 w-full text-xl" type="file" name="path_img" :value="old('path_img')" required />
            <x-input-error :messages="$errors->get('path_img')" class="mt-2" />
        </div>
        
         <!-- Name -->
         <div class="pb-4">
         <a class="underline  text-xl text-gray-600 hover:text-gray-900" href="{{ route('welcome') }}">
                {{ __('Посмотреть задание') }}
            </a>
        </div>
        <!-- Name -->
        <div>
        <x-primary-button >
                {{ __('Отправить открытку') }}
            </x-primary-button>
        </div>
    </form> 
    </div>   
    </div>
</div>
</x-app-layout>