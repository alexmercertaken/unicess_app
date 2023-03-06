<x-admin-layout>

    <style>
        [x-cloak] { display: none }
    </style>

    <div class="py-12 px-5 w-full ">

        <div class=" flex py-5 px-10 justify-between">
        <h1 class="text-2xl" >Events Dashboard</h1>
        {{--  Modal Starts here  --}}
        <div x-cloak  x-data="{ 'showModal': false }"
        @keydown.escape="showModal = false" >
        <!-- Trigger for Modal -->
        <button class="bg-green-500 p-2 rounded-md text-white" type="button" @click="showModal = true">Create Event</button>

        <!-- Modal -->
        <div class="fixed inset-0 z-50 flex items-center justify-center overflow-auto bg-black bg-opacity-50" x-show="showModal">
            <!-- Modal inner -->
            <div
                class="w-1/4 px-6 py-4 mx-auto text-left bg-white rounded-lg shadow-lg "
                @click.away="showModal = false"
                x-transition:enter="motion-safe:ease-out duration-300"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"

            >
                <!-- Title / Close-->
                <div class="flex items-center justify-between mb-10 ">
                    <h5 class="mr-3 text-black max-w-none">Create events</h5>

                    <button type="button" class=" z-50 cursor-pointer" @click="showModal = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>


                <!-- content -->
                <div class="w-full">

                    <form action="{{route('admin.latest-events.store')}}" method="POST" enctype="multipart/form-data">

                        @csrf
                      <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                          Title
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" name="title" type="text" placeholder="">
                        @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                      <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                          Description
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" name="description" type="text" placeholder=""></textarea>
                        @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                      <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="status">
                          Status
                        </label>
                        <input class="shadow appearance-none border rounded text-green-500 leading-tight focus:outline-none focus:shadow-outline" id="status" name="status" type="checkbox" placeholder="">
                        @error('status') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                      <div class="mb-6  flex flex-col">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                          Image
                        </label>
                        <input type="file" id="image" class="shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  name="image" placeholder="">
                        @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="justify-center flex">
                        <label for=""></label>
                        <div class="p-2 w-46 ">
                            <img class="rounded-md" id="showImage" src="{{ asset('upload/no-image.png') }}" alt="">
                        </div>
                    </div>

                      <div class="flex items-center justify-between ">
                        <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                         Create Event
                        </button>

                      </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
 </div>
    {{--  Modal End heere  --}}


        <div class="max-w-full mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white shadow-sm sm:rounded-lg drop-shadow-lg h-3/4">

                <div class="flex flex-col p-5">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="flex p-2 my-2 justify-between">
                            <h1 class="font-semibold"> Event</h1>

                            {{--  <a  class="bg-blue-500 px-2 rounded-md text-white" href={{ route('admin.latest-events.create') }}>Create Event</a>  --}}

                        </div>

                        <div class="overflow-hidden">

                            <table class="min-w-full">
                            <thead class="border-b">
                              <tr class="bg-gray-50">
                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-gray-700">
                                   Date
                                </th>
                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-gray-700">
                                   Title
                                </th>
                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-gray-700">
                                  Description
                                </th>
                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-gray-700">
                                  Status
                                </th>
                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-gray-700">
                                  Image
                                </th>

                                <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-gray-700">
                                 Option
                                </th>
                              </tr>
                            </thead>
                            <tbody >
                                @foreach ($latests as $latest )

                                <tr class="border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-xs font-medium text-gray-900">
                                        {{ $latest->updated_at->diffForHumans() }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                        {{Str::limit($latest->title, 15)}}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                        {{Str::limit($latest->description, 50)}}
                                    </td>
                                    <td class="text-sm text-green-600 font-light px-6 py-4 whitespace-nowrap">

                                        @if ($latest->status == '0')
                                             <span class="text-red-500">hidden</span>
                                        @else
                                            visible
                                        @endif
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap w-16">

                                        <img class="rounded-2xl" id="showImage" src="{{ (!empty($latest->image))? url('upload/image-folder/'. $latest->image): url('upload/no-image.png') }}"   alt="">
                                    </td>

                                    <td class="text-sm text-blue-500 font-light px-6 py-4 my-auto whitespace-nowrap flex  mt-2">
                                      <a href="{{ route('admin.latest-events.edit', $latest->id) }}"> Edit</a>
                                      <form action="{{ route('admin.latest-events.delete', $latest->id) }}" method="POST" onsubmit="return confirm ('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500" href="">
                                            <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="30"><path d="M261 936q-24.75 0-42.375-17.625T201 876V306h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438V306ZM367 790h60V391h-60v399Zm166 0h60V391h-60v399ZM261 306v570-570Z"/></svg>

                                        </button>
                                        </form>
                                    </td>


                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

            </div>
        </div>
    </div>



    <x-messages/>

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
