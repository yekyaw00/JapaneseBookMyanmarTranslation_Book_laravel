@extends('layout')
@section('context')
<div class="pt-5 pl-5">
    <a class="px-3 py-1 rounded-lg bg-pink-600 hover:bg-pink-200" href="{{route('book.create')}}">Create New Book</a>
</div>
<div class=" p-5 w-screen flex flex-row gap-x-3 ">
    @foreach($books as $book)
    <div class="p-3 bg-white rounded-xl border-2 hover:shadow-2xl">
        <a href="{{route('book.show',$book->id)}}">
            <div class="w-80 h-96 " style="background-image:url('{{url($book->book_photo)}}'); background-position: center;"></div>
            <div class="text-center font-serif text-xl font-weight-bold">
                {{$book->book_name}}
            </div>
        </a>
        <div class=" pt-3 flex justify-between">

                <a class="px-3 py-1 text-lg rounded-xl bg-green-300 hover:bg-green-600 cursor-default" href="{{route('book.edit',$book->id)}}">Edit</a>

            <form action="{{route('book.destroy',$book->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class=" px-3 py-1 text-lg rounded-xl bg-red-600 hover:bg-red-300 " type=" submit">Delete</button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection