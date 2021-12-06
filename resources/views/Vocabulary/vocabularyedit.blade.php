@extends('layout')
@section('context')
<div class="p-7">
    <form class="grid grid-cols-4 gap-4 w-4/5 justify-around" action="{{route('vocabulary.update',$vocabulary->id)}}" method="POST">
        @csrf @method('put')
        <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                <p>
                    <label for="name" class="bg-white text-gray-600 px-1">Vocabulary Name</label>
                </p>
            </div>
            <p>
                <input class="m-3 w-80 border-2 py-2" type="text" name="vocab_name" value="{{$vocabulary->vocab_name}}">
            </p>
        </div>
        <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                <p>
                    <label for="name" class="bg-white text-gray-600 px-1">Vocabulary Pronunciation</label>
                </p>
            </div>
            <p>
                <input class="m-3 w-80 border-2 py-2" type="text" name="vocab_pronunciation" value="{{$vocabulary->vocab_pronunciation}}">
            </p>
        </div>
        <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                <p>
                    <label for="name" class="bg-white text-gray-600 px-1">Vocabulary Meaning</label>
                </p>
            </div>
            <p>
                <input class="m-3 w-80 border-2 py-2" type="text" name="vocab_meaning" value="{{$vocabulary->vocab_meaning}}">
            </p>
        </div>
        <div class="px-2 py-5">
            <input class="px-3 py-2 rounded-lg bg-blue-400 hover:bg-blue-600 w-3/12" type="submit" value="Save">
        </div>
    </form>
</div>
@endsection