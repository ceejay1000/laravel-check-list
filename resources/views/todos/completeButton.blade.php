@if ($todo->completed)
    <a href='/todos/{{ $todo->id }}/edit' class="py-1 px-1 text-orange-400 cursor-pointer rounded text-black mx-1">
        <span>&#9999</span>
    </a>
    <span class="text-gray cursor-pointer" onclick="document.getElementById('form-incomplete-{{$todo->id}}').submit();">&#10062</span>
    <form id="{{'form-incomplete-' . $todo->id}}" style="display: none" method="POST" action="{{ route('todo.incomplete', ['todo' => $todo->id]) }}">
        @csrf
        @method('delete')
    </form>
    <form id="{{'form-delete-' . $todo->id}}" style="display: none" method="POST" action="{{ route('todo.delete', ['todo' => $todo->id]) }}">
        @csrf
        @method('delete')
    </form>
    <span class="text-gray cursor-pointer" onclick="document.getElementById('form-delete-{{$todo->id}}').submit();">&#10060</span>
    @else
    <a href='/todos/{{ $todo->id }}/edit' class="py-1 px-1 text-orange-400 cursor-pointer rounded text-black mx-1">
        <span>&#9999</span>
    </a>
    <span class="text-gray cursor-pointer" onclick="document.getElementById('form-complete-{{$todo->id}}').submit();">&#10004</span>
    <form id="{{'form-complete-' . $todo->id}}" style="display: none" method="POST" action="{{ route('todo.complete', ['todo' => $todo->id]) }}">
        @csrf
        @method('delete')
    </form>
    <form id="{{'form-delete-' . $todo->id}}" style="display: none" method="POST" action="{{ route('todo.delete', ['todo' => $todo->id]) }}">
        @csrf
        @method('delete')
    </form>
    <span class="text-gray cursor-pointer" onclick="document.getElementById('form-delete-{{$todo->id}}').submit();">&#10060</span>
@endif