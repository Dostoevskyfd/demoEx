<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Созднание открытки') }}
        </h2>
</x-slot>
<div class="py-12">
<div class="conteiner">
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


<div class=" pt-12 sm:px-6 lg:px-8 block bg-slate-100">
    <h2 class="text-xl text-black pr-2">Ваша открытка:</h2>
        <div class="justify-center flex  w-99 h-80 bg-white overflow-hidden shadow-sm sm:rounded-lg pt-10 ">
        @foreach ($works as $work)

   
<div class="pr-7 flex">
<p class="text-xl text-black pr-2">Название открытки:  </p>
<p class="text-xl text-black">{{$work->title}}</p>
</div>
<div class="pr-7 block">
<p class="text-xl text-black pr-2">Оценка: </p>
@isset($work->path_img)

    <img src="{{ Storage::url($work->path_img)}}" class="contact-block_img w-52 h-52 pt-2" alt="">
    @endisset
</div>
<div class="pr-7 flex">
<p class="text-xl text-black pr-2">Категория открытки:  </p>
<p class="text-xl text-black">{{$work->categorie->text}}</p>
</div>
<div class="pr-7 flex">
<p class="text-xl text-black pr-2">Оценка: </p>
<p class="text-xl text-black">{{$work->score}}</p>
</div>
@endforeach
        </div>
    </div>
    </div>
</x-app-layout>