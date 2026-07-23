<div>
    <h1> Hi jeg er en blade template!</h1>
</div>
<h2> @ if -statement + @ foreach loop</h2>
<div>
    {{-- @FOEACH OG @if (BETINGELSE) DIREKTIVER  ll. 137 i web.php --}}
    {{--  --}}
    @if (count($tasks))
        @foreach ($tasks as $task)
            <li>{{ $task->title }}
            </li>
        @endforeach
    @else
        <div>Ingen opgaver endnu!</div>
    @endif
</div>
{{-- http://127.0.0.1:8000/taskpage --}}

<div>
    <h2>Alternativ brug af direktiver @ forelse</h2>
</div>

{{-- ALTERNEERTIV BRUG DIREKTIVET FORELSE --}}
<div>
    @forelse ($tasks as $task)
        <li>{{ $task->title }}
        </li>
    @empty
        <div>Ingen opgaver endnu!</div>
    @endforelse
</div>

{{-- ANVENDER ROUTE OG PASSERER TASK SOM ID --}}

<div>
    <h2>Route() med {id} som parameter</h2>
</div>

{{-- ALTERNEERTIV BRUG DIREKTIVET FORELSE --}}
<div>
    @forelse ($tasks as $task)
        <li> <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </li>
    @empty
        <div>Ingen opgaver endnu!</div>
    @endforelse
</div>
