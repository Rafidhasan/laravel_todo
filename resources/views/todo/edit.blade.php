@extends('layouts.app')
@section('content')
    <div class="title m-b-md">
        Task - {{$todo->title}}
    </div>
    <form action="/{{$todo->id}}" method="post" type="submit">
        @csrf
        <input name="title" type="text" value="{{$todo->title}}">
        <input type="submit" value="edit">
    </form>
    <ul class="list">
        <li class="links"><a href="">{{$todo->id}}: {{$todo->title}}</a></li>
    </ul>
@endsection
