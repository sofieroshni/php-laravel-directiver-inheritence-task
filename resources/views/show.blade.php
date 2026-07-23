@@ -0,0 +1,14 @@
@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div style="width:300px; height:300px; padding: 10px; background-color:blue;">

        <p>{{ $task->description }}</p>

        @if ($task->long_description)
            <p>{{ $task->long_description }}</p>
        @endif

        <p>{{ $task->created_at }}</p>
        <p>{{ $task->updated_at }}</p>

    </div>
@endsection
