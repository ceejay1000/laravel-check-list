@extends('layouts.todos')

@section('content')
   
    <div class="flex justify-center border-b pb-4">
        <h1 class="text-2xl">All Your Todos</h1>
        <!-- <h1 class="text-2l"></h1> -->
        <a href='/todos/create' class="py-2 px-1 bg-blue-300  cursor-pointer rounded text-white mx-5">Create new todo</a>
    </div>
    <form action="{{ route('todo.update', ['todo' => $todo->id]) }}" method="post" class="py-5">
        @csrf
        @method('patch')
            <x-alert>

            </x-alert>
        <input type="text" name="title" class="py-3 px-2 border" value="{{ $todo->title }}"/>
        <input type="submit" value="Update" class="p-2 border rounded">
    </form>

    <a href="/todos" class="py-2 px-1 bg-white-300  cursor-pointer rounded text-black mx-5 border">Back</a>
@endsection