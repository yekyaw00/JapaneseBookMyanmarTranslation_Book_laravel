@extends('userlayout')
@section('content')

<div class="grid lg:grid-cols-4 xl:grid-cols-5 grid-cols-1 lg:gap-x-3 gap-x-10 gap-y-3 px-5 py-3 m-auto justify-center">
    @foreach($books as $book)
    <a href="{{route('user.book.detail',$book->id)}}">
        <div class="bg-white rounded-xl p-4 shadow-xl mt-4  pb-0">
            <div class="flex flex-col justify-center items-center">
                <img src="{{asset($book->book_photo)}}" class="w-full h-80 rounded-lg" />
            </div>
            <p class="font-semibold text-lg mt-1 text-left">{{$book->book_name}}</p>
            <p class="font-semibold text-md text-gray-400">Level: {{$book->level}}</p>
        </div>
    </a>
    @endforeach
    

</div>

@endsection