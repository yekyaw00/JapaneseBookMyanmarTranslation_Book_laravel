@extends('userlayout')
@section('content')




<div class="h-full  grid pt-10">
    <div class="w-10/12  mx-auto rounded border">
        <div class="bg-white p-10 shadow-sm">
            <div class="flex w-full justify-center">
                <img src="{{asset($book->book_photo)}}" alt="">
            </div>
            <div class=" w-full text-center">
                <h1 class="block text-xl font-medium text-gray-800">" {{$book->book_name}} "</h1>
            </div>

            <div class="h-1 w-full mx-auto border-b my-5"></div>
            <div class="flex flex-col space-y-3">
                @foreach($chapters as $chapter)
                <div class="transition hover:bg-indigo-50 py-3">
                    <!-- header -->
                    <div class="accordion-header cursor-pointer transition flex space-x-5 px-5 items-center h-16">
                        <i class="fas fa-plus"></i>
                        <h3 class="font-bold tracking-wider">{{$chapter->chapter_name}}</h3>
                    </div>
                    <!-- Content -->
                    <div class="accordion-content px-5 pt-0 overflow-hidden max-h-0">
                        <table class="min-w-full table-fixed border-collapse block md:table">
                            <thead class="md:table-header-group">
                                <tr class="border border-grey-500 md:border-none md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">
                                    <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 md:table-cell w-1/12">Number</th>
                                    <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 md:table-cell w-3/12">Vocabulary</th>
                                    <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 md:table-cell w-3/12">Pronunciation</th>
                                    <th class="bg-gray-600 p-2 text-center text-white font-bold md:border md:border-grey-500 md:table-cell w-4/12">Meaning</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($chapter->vocabularies as $vocab_key => $vocabulary)
                                <tr class="border border-grey-500  md:border-none md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative">
                                    <td class="bg-white px-7 text-right text-black font-bold md:border md:border-grey-500 md:table-cell w-1/12">{{++$vocab_key}}</td>
                                    <td class="bg-white p-2 text-left text-black font-bold md:border md:border-grey-500 md:table-cell w-3/12">{{$vocabulary->vocab_name}}</td>
                                    <td class="bg-white p-2 text-left text-black font-bold md:border md:border-grey-500 md:table-cell w-3/12">{{$vocabulary->vocab_pronunciation}}</td>
                                    <td class="bg-white p-2 text-left text-black font-bold md:border md:border-grey-500 md:table-cell w-4/12">
                                        <span class="w-full inline-block">{{$vocabulary->vocab_meaning}}</span>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
    .accordion-content {
        transition: max-height 0.3s ease-out, padding 0.3s ease;
    }
</style>


@endsection
@section('js')

@endsection