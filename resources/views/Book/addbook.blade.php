@extends('layout')
@section('context')

<form method="POST" action="{{route('book.store')}}" enctype="multipart/form-data">
    @csrf
    <div class=" bg-white shadow rounded w-1/3 p-6">
        <div class="grid lg:grid-cols-2 gap-6">
            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label for="name" class="bg-white text-gray-600 px-1">Book name</label>
                    </p>
                </div>
                <p>
                    <input id="name" autocomplete="false" tabindex="0" name="book_name" type="text" class="py-1 px-1 text-gray-900 outline-none block h-full w-full">
                </p>
            </div>
            <div class="border focus-within:border-blue-500 focus-within:text-blue-500 transition-all duration-500 relative rounded p-1 px-3">
                <div class="-mt-4 absolute tracking-wider px-1 uppercase text-xs">
                    <p>
                        <label class="bg-white text-gray-600 px-1">Book Photo</label>
                    </p>
                </div>
                <p>
                    <label class="px-3 py-1 bg-indigo-300 hover:bg-indigo-600" for="book_image" type="button">
                        browse
                    </label>
                    <input autocomplete="false" tabindex="0" type="file" name="book_photo" class="py-1 px-1 outline-none hidden h-full w-full" id="book_image" onchange="loadFile(event)">
                </p>
                <p class = "py-3">
                    <img id="blah" src="#" alt="your image" />
                </p>
            </div>
            <div class="border-t mt-6 pt-3">
                <button class="rounded text-gray-100 px-3 py-1 bg-blue-500 hover:shadow-inner hover:bg-blue-700 transition-all duration-300">
                    Save
                </button>
            </div>
        </div>
</form>
@endsection

@section('script')
<script>
    $('#blah').hide();

    var loadFile = function(event) {
        var output = document.getElementById('blah');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
            $('#blah').show();
        }
    };
</script>
@endsection