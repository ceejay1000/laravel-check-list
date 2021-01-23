<div>
    <!-- If you do not have a consistent goal in life, you can not live it in a consistent way. - Marcus Aurelius -->
    {{ $slot }}
    @if(session()->has('message'))
    {{ session()->forget('message') }}
        <div class="py-4 px-2 bg-green-400">{{ session()->get('message')}}</div>
        @elseif(session()->has('error'))
        <div class="py-4 px-2 bg-red-200">{{ session()->get('error')}}</div>
    @endif

    @if ($errors->any())
        <div class="py-4 px-2 bg-red-200">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>