<x-admin-layout>



    <div class="py-12 px-4 w-3/5  m-auto ">
        <h1 class="p-5 text-4xl ml-2">Edit News</h1>
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white shadow-sm sm:rounded-lg drop-shadow-lg h-3/4">

                <div class="p-2  flex items-center justify-between">
                    <h1></h1>
                    <a class=" rounded-md text-white" href={{ route('admin.latest-events.index') }}>
                        <svg class="fill-black" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="40"><path d="m249 849-42-42 231-231-231-231 42-42 231 231 231-231 42 42-231 231 231 231-42 42-231-231-231 231Z"/></svg>
                    </a>
                    </div>





                    <div class="w-full p-5 drop-shadow-md">

                    {{--  FORM   --}}
                    <form action="{{route('admin.latest-events.update', $latestEvents->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                      <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                          Title
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder=""
                        value = "{{$latestEvents->title}}">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                      <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                          Description
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight
                        focus:outline-none focus:shadow-outline" id="description" name="description" type="text"
                        placeholder="">{{$latestEvents->description}}</textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-xs font-bold mb-2" for="status">
                          Status
                        </label>
                        <input class="shadow appearance-none border rounded text-green-500 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" type="checkbox" placeholder=""
                        {{ $latestEvents->status == '1' ? 'checked': '' }}
                        >
                        @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>


                      <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                          Image
                        </label>
                        <input type="file" id="image" class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name="image" placeholder=""
                        value = "{{$latestEvents->image}}">
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>





                    <div class="">
                        <label for=""></label>
                        <div class="p-2 w-48 ">
                            <img id="showImage" src="{{ (!empty($latestEvents->image))? url('upload/image-folder/'. $latestEvents->image): url('upload/no-image.png') }}" alt="">
                        </div>
                    </div>


                      <div class="flex items-center justify-between mt-5">
                        <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                         Update Event
                        </button>

                      </div>
                    </form>

                  </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });

    </script>





</x-admin-layout>
