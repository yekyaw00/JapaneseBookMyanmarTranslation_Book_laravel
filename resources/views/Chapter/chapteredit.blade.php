@extends('layout')
@section('context')

    <form class="flex p-3 space-x-2" action="{{route('chapter.update',$chapter->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input class="border-2 px-3 py-2" type="text" name="chapter_name" value="{{$chapter->chapter_name}}">
        <input class="px-3 py-1 bg-green-400 hover:bg-green-600 rounded-lg" type="submit" value="Save">
    </form>

@endsection