@extends('layouts.todos')

@section('content')
    <div class="flex justify-center border-b pb-4">
        <h1 class="text-2xl">What Next To-do</h1>
        <a href='/todos/create' class="py-2 px-1 bg-blue-300  cursor-pointer rounded text-white mx-5">Create Todo</a>
    </div>
    <form action="/todos/create" method="post" class="py-5">
        @csrf
            <x-alert>
            </x-alert>
        <input type="text" name="title" class="py-3 px-2 border"/>
        <input type="submit" value="Create" class="p-2 border rounded">
    </form>
@endsection