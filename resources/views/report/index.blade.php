<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Конкурс открыток на новый год') }}
        </h2>
</x-slot>

<div class="py-12">
<div class="">
<div class="container">
   
    <p class="ml-20 text-gray-900">Ваша открытка:</p>
</div>
<div class="bg-white rounded-lg px-6 py-10 mt-10 w-390 h-9 ">
<a class=" pt-10 pl-20 underline text-sm text-gray-600 hover:text-gray-900 rounded-md " href="{{route('report.create')}}">
                {{ __('Сформировать открытку...') }}
            </a>
</div>

    <div class=" pt-12 sm:px-6 lg:px-8 block bg-slate-100">
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
<p class="text-xl text-black">{{$work->score->number}}</p>
</div>
@endforeach
        </div>
    </div>

</div>
</div>
</x-app-layout>