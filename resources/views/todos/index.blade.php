@extends('layouts.todos')

@section('content')
    <div class="flex justify-center border-b pb-4">
        <h1 class="text-2xl">All Your Todos</h1>
        <a href='/todos/create' class="py-2 cursor-pointer text-white mx-5">
            <span>&#128221</span>
        </a>
    </div>
    <x-alert>
    </x-alert>
    <ul class="my-5">
        @foreach($todos as $todo)
        <li class="flex justify-between py-1 mx-5">
            @if($todo->completed)
              <p class="line-through">{{ $todo->title }}</p>
            @else
              <p>{{ $todo->title }}</p>
            @endif
            <div>
            @include('todos.completeButton')
            </div>
        </li>
        @endforeach    
    </ul>

    <a href='/todos/create' class="py-2 px-1 bg-white-300  cursor-pointer rounded text-black mx-5 border">Back</a>
@endsection