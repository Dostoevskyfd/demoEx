<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Панель администратора') }}
        </h2>
</x-slot>

<div class="py-12">
<div class=" sm:px-6 lg:px-8 block bg-slate-100">
<div class="justify-center flex  w-99 h-80 bg-white overflow-hidden shadow-sm sm:rounded-lg pt-10">
@foreach ($works as $work)
<div class="pr-7 flex">
    <p class="text-xl text-black pr-2">Пользователь:  </p>
        <p class="text-xl text-black"> {{$work->user->fullName()}}</p>
    </div>
    <div class="pr-7 flex">
        <p class="text-xl text-black pr-2">Название открытки:  </p>
    <p class="text-xl text-black">{{$work->title}}</p>
    </div>
    <div class="pr-7">
    <p class="text-xl text-black pr-2">Открытка:  </p>
    @isset($work->path_img)
        <img  src="{{ Storage::url($work->path_img)}}" class="contact-block_img w-52 h-52 pt-2" alt="">
        @endisset
    </div>
    <div class="pr-7 flex">
    <p class="text-xl text-black pr-2">Категория открытки:  </p>
    <p class="text-xl text-black">{{$work->categorie->text}}</p>
    </div>

<div class="flex">
<p class="text-xl text-black pr-2">Оценка: </p>
@if ($work->scores_id==1)
<form id="form-update-{{$work->id}}" action="{{route('update')}}" method="POST">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" value="{{$work->id}}">
            <select name="scores_id" onchange="document.getElementById('form-update-{{$work->id}}').submit()">
        @foreach ($scores as $score)
        <option value="{{$score->id}}" class="text-xl text-black">{{$score->number}}</option>
        @endforeach
        </select>
</form>
 @else
<p class="text-xl text-black" > 
{{$work->score->number}}
</p>
@endif
    </div>
    @endforeach
</div>
</div>


</div>
</x-app-layout>