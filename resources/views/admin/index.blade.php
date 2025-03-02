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
<!-- Если оценка не выставлена, показываем форму -->
@if ($work->score === null)
            <form action="{{ route('update', $work) }}" method="POST">
                @csrf
                @method('PATCH')
                <label for="score" class="block text-sm font-medium text-gray-700">Оценка:</label>
                <input type="number" name="score" min="0" max="100" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                <button type="submit"
                    class="mt-2 inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Оценить
                </button>
            </form>
        @else
            <!-- Если оценка выставлена, показываем текст -->
            <p class="text-xl text-black">Оценка: {{ $work->score }}</p>
        @endif
</div>
    @endforeach
</div>
</div>


</div>
</x-app-layout>