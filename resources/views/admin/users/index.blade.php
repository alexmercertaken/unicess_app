<x-admin-layout>
  <div class="py-12 w-full  ">
    <div class="max-w-full mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg ">


        <div class="max-w-full mx-auto p-10">
            <div class="p-3 text-gray-900 text-2xl font-bold flex justify-between ">
                {{ __("All Account") }}
                <form>
                    <div class="flex flex-row bg- justify-end space-x-2 py-2">
                    <div>
                        <select id="filter_faculty_id" name="faculty_id" class="border-slate-200">
                        @foreach ($faculties as $id => $name )
                        <option {{ $id == request('faculty_id') ? 'selected': '' }} value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="">
                        <div class ="flex justify-center items-center relative overflow-hidden  border">
                            <input type="text" id="search" name="search" value="{{ request('$search') }}"   class="border-none outline-0" placeholder="Search by names & email" aria-label="Search..." aria-describedby="button-addon2" onfocus="this.value=''" >



                                <button  class="px-2 py-2 border-slate-200 border-r" id="btn-clear" type="button">
                                    <svg class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="25"><path d="M481 898q-131 0-225.5-94.5T161 578v-45l-80 80-39-39 149-149 149 149-39 39-80-80v45q0 107 76.5 183.5T481 838q29 0 55-5t49-15l43 43q-36 20-72.5 28.5T481 898Zm289-169L621 580l40-40 79 79v-41q0-107-76.5-183.5T480 318q-29 0-55 5.5T376 337l-43-43q36-20 72.5-28t74.5-8q131 0 225.5 94.5T800 578v43l80-80 39 39-149 149Z"/></svg>
                                </button>



                                <button type="submit" class="py-1 px-2 " id="button-addon2">
                                <svg class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="25"><path d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z"/></svg>
                                </button>

                        </div>

                    </div>
                    </div>
                </form>
            </div>

            <div class="flex flex-col">
            <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <div id="search_list"></div>
                    {{--  All Account Table  --}}
                    <div class="table-data">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-700 ">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> First Name</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Middle Name</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Last Name</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Email </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Address </th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Gender</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Contact</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Faculty</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Role</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Authorize</th>
                                    <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"> Action</th>
                                </tr>
                            </thead>
                        <tbody class="bg-blue-500 divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">

                                @foreach ($users as $user )

                                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->first_name }}</td>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->middle_name }}</td>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->last_name }}</td>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Str::limit($user->email, 15) }}</td>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Str::limit($user->address, 15) }}</td>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->gender }}</td>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ Str::limit($user->contact_number, 11) }}</td>
                                    <td class="py-4 px-4 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $user->faculty == null ? 'Beneficiary/Partners' : $user->faculty->name }}</td>

                                <td>
                                     @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $role )
                                            <span class="block my-2 text-yellow-500  p-1 rounded-lg ">{{ $role }}</span>
                                        @endforeach
                                    @endif
                                </td>

                                <td>
                                    @if ($user->authorize == '2')
                                        <span class="text-violet-500">declined</span>
                                    @elseif($user->authorize == '1')
                                        <span class="text-green-500">approved</span>
                                    @else
                                        <span class="text-red-600">pending</span>
                                    @endif
                                </td>

                                <td class="text-sm text-blue-500 font-light px-6 py-4 my-auto whitespace-nowrap flex  mt-2">
                                    <a href={{ route('admin.users.show', $user->id) }} class="text-blue-500 text-sm ">Edit</a>
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm ('Are you sure?')">
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
                    {{--  End of ALl acount Table  --}}
                    {{ $users->links() }}
                            </div>
                        </div>
                     </div>
                  </div>
                <x-messages/>
            </div>
        </div>
    </div>
</div>








    <script type="text/javascript">


    $(document).on('keyup', function(e){
        e.preventDefault();
        let search_string = $('#search').val();
        console.log(search_string)
        $.ajax({
            url:"{{ route('admin.users.search') }}",
            method: 'GET',
            data: {search_string:search_string},
            success:function(res){
                $('.table-data').html(res);
                if(rest.status == 'nothing found'){
                    $('.table-data').html('<span>Nothing Found</span>');
                }

            }

         })
    });



    </script>


</x-admin-layout>
