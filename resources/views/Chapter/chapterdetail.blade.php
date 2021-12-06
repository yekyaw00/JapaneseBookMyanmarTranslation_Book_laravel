@extends('layout')
@section('context')
<div class="p-7">
    <form class="grid grid-cols-4 gap-4 w-4/5 justify-around" action="{{route('vocabulary.store')}}" method="POST">
        @csrf
        <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                <p>
                    <label for="name" class="bg-white text-gray-600 px-1">Vocabulary Name</label>
                </p>
            </div>
            <p>
                <input class="m-3 w-80 border-2 py-2" type="text" name="vocab_name">
            </p>
        </div>
        <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                <p>
                    <label for="name" class="bg-white text-gray-600 px-1">Vocabulary Pronunciation</label>
                </p>
            </div>
            <p>
                <input class="m-3 w-80 border-2 py-2" type="text" name="vocab_pronunciation">
            </p>
        </div>
        <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
            <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                <p>
                    <label for="name" class="bg-white text-gray-600 px-1">Vocabulary Meaning</label>
                </p>
            </div>
            <p>
                <input class="m-3 w-80 border-2 py-2" type="text" name="vocab_meaning">
            </p>
        </div>
        <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
        <div class="px-2 py-5">
            <input class="px-3 py-2 rounded-lg bg-blue-400 hover:bg-blue-600 w-3/12" type="submit" value="Create">
        </div>
    </form>
</div>
<div>
    <table class="min-w-full border-collapse block md:table">
        <thead class="block md:table-header-group">
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">
                <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 block md:table-cell">Number</th>
                <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 block md:table-cell">Vocabulary</th>
                <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 block md:table-cell">Pronunciation</th>
                <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 block md:table-cell">Meaning</th>
                <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 block md:table-cell">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vocabularies as $vocab_key => $vocabulary)
            <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">
                <td class="bg-white p-2 text-center text-black font-bold md:border md:border-grey-500 block md:table-cell">{{++$vocab_key}}</td>
                <td class="bg-white p-2 text-center text-black font-bold md:border md:border-grey-500 block md:table-cell">{{$vocabulary->vocab_name}}</td>
                <td class="bg-white p-2 text-center text-black font-bold md:border md:border-grey-500 block md:table-cell">{{$vocabulary->vocab_pronunciation}}</td>
                <td class="bg-white p-2 text-center text-black font-bold md:border md:border-grey-500 block md:table-cell">{{$vocabulary->vocab_meaning}}</td>
                <td class="flex justify-content-lg-center bg-white p-2 text-center text-black font-bold md:border md:border-grey-500 md:table-cell">
                    <form class="space-x-5" action="{{route('vocabulary.destroy', $vocabulary->id)}}" method="Post">
                        <a class="px-3 py-1 bg-blue-400 hover:bg-blue-700 rounded-md" href="{{route('vocabulary.edit',$vocabulary->id)}}">Edit</a>
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