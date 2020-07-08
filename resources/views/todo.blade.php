@extends('layouts.app')
@section('content')
    <div class="title m-b-md">
        All Tasks
    </div>
    <form action="/" method="post" type="submit">
        @csrf
        <input name="title" type="text" placeholder="add todo">
        <input type="submit" value="submit">
    </form>
    <ul class="list">
        @foreach ($todos as $todo)
            <li class="links">
                @if ($todo->completed)
                    <a href="/{{$todo->id}}/edit"><strike>{{++$i}}: {{$todo->title}}</strike></a>
                @else
                    <a href="/{{$todo->id}}/edit">{{++$i}}: {{$todo->title}}</a>
                @endif
                <a href = '{{$todo->id}}/complete' type="submit" style="color: darkgreen;">Completed</a>
                <a href = '{{$todo->id}}/delete' type="submit" style="color: darkred;">Delete</a>
            </li>
        @endforeach
    </ul>
@endsection
