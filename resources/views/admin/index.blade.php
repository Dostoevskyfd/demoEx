<x-app-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Панель администратора') }}
        </h2>
</x-slot>

<div class="py-12">
<div class=" max-w-7xl mx-auto sm:px-6 lg:px-8">
<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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

@if ($work->score === null)
    <form action="{{ route('update', $work) }}" method="POST">
        @csrf
        @method('PATCH')
        <input type="number" name="score" min="0" max="100" required>
        <button type="submit">Оценить</button>
    </form>
@else
    <p class="text-xl text-black">{{ $work->score }}</p>
@endif
                        </div>
    @endforeach
</div>
</div>


</div>
</x-app-layout>