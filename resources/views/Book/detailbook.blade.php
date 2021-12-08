@extends('layout')
@section('context')
<div class="flex flex-col">
    <div class="w-2/3 block">
        <div class="flex font-bold text-xl justify-content-center">
            {{$book->book_name}} / {{$book->level}}
        </div>
        <div class="p-2 bg-white rounded-xl">
            <div class="w-80 h-96" style="background-image:url('{{url($book->book_photo)}}'); background-position: center; height: 500; width: 300;"></div>
        </div>
    </div>
    <div class="w-2/6 p-3">
        <form action="{{route('chapter.store')}}" method="post">
            @csrf
            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="name" class="bg-white text-gray-600 px-1">Chapter name</label>
                    </p>
                </div>
                <p>
                    <input id="name" autocomplete="false" tabindex="0" name="chapter_name" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                    <input type="hidden" name="book_id" value="{{$book->id}}">
                </p>
            </div>
            <button class="px-3 py-1 bg-blue-500 hover:bg-blue-300 rounded-md mt-3" type="submit">Save</button>
    </div>
    </form>
</div>
<div>
    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">
                <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 block md:table-cell">Number</th>
                <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 block md:table-cell">Name</th>
                <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 block md:table-cell">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chapters as $chapter)
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">
                <td class="bg-white p-2 text-center text-black font-bold md:border md:border-grey-500 block md:table-cell">{{$chapter->id}}</td>
                <td class="bg-white p-2 text-center text-black font-bold md:border md:border-grey-500 block md:table-cell">
                  <a class="hover:underline" href="{{route('chapter.show',$chapter->id)}}">{{$chapter->chapter_name}}</a>
                </td>
                <td class="flex justify-content-lg-center bg-white p-2 text-center text-black font-bold md:border md:border-grey-500 md:table-cell">
                    <form class="space-x-5" action="{{route('chapter.destroy', $chapter->id)}}" method="Post">
                        <a class="px-3 py-1 bg-blue-400 hover:bg-blue-700 rounded-md" href="{{route('chapter.edit',$chapter->id)}}">Edit</a>
                        @csrf @method('DELETE')
                        <button type="submit" class="px-3 py-1 bg-red-300 hover:bg-red-700 rounded-md">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection