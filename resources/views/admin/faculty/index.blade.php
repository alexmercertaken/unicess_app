<x-admin-layout>

    <!-- component -->
    <section class="antialiased  text-gray-600 pt-10 px-4">
    <div class="flex flex-col justify-center">


        <!-- Table -->
        <div class="w-full  mx-auto bg-white shadow-lg rounded-lg border border-gray-200">
            <header class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">Faculty User</h2>
            </header>
            <div class="p-3 w-full">

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
                            <input type="text" name="search" value="{{ request('$search') }}" id="search"  class="border-none outline-0" placeholder="Search by names & email" aria-label="Search..." aria-describedby="button-addon2" >

                            {{--  <div class="input-group-append absolute right-0 flex">  --}}

                                <button  class="px-2 py-2 border-slate-200 border-r" id="btn-clear" type="button">
                                    <svg class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="25"><path d="M481 898q-131 0-225.5-94.5T161 578v-45l-80 80-39-39 149-149 149 149-39 39-80-80v45q0 107 76.5 183.5T481 838q29 0 55-5t49-15l43 43q-36 20-72.5 28.5T481 898Zm289-169L621 580l40-40 79 79v-41q0-107-76.5-183.5T480 318q-29 0-55 5.5T376 337l-43-43q36-20 72.5-28t74.5-8q131 0 225.5 94.5T800 578v43l80-80 39 39-149 149Z"/></svg>
                                </button>



                                <button type="submit" class="py-1 px-2 " id="button-addon2">
                                <svg class="fill-gray-600" xmlns="http://www.w3.org/2000/svg" height="30" viewBox="0 96 960 960" width="25"><path d="M796 935 533 672q-30 26-69.959 40.5T378 727q-108.162 0-183.081-75Q120 577 120 471t75-181q75-75 181.5-75t181 75Q632 365 632 471.15 632 514 618 554q-14 40-42 75l264 262-44 44ZM377 667q81.25 0 138.125-57.5T572 471q0-81-56.875-138.5T377 275q-82.083 0-139.542 57.5Q180 390 180 471t57.458 138.5Q294.917 667 377 667Z"/></svg>
                                </button>
                            {{--  </div>  --}}
                        </div>

                    </div>
                    </div>
                </form>

                <div class="overflow-x-auto">
                    <table class="table-auto w-full">
                        <thead class="text-xs font-semibold uppercase text-gray-400 bg-gray-50">
                            <tr>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">First Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Middle Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Last Name</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Email</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-left">Faculty</div>
                                </th>
                                <th class="p-2 whitespace-nowrap">
                                    <div class="font-semibold text-center">Role</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-100">
                            @foreach ($users as $user )
                            <tr>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{--  <div class="w-10 h-10 flex-shrink-0 mr-2 sm:mr-3"><img class="rounded-full" src="https://raw.githubusercontent.com/cruip/vuejs-admin-dashboard-template/main/src/images/user-36-05.jpg" width="40" height="40" alt="Alex Shatov"></div>  --}}
                                        <div class="font-medium text-gray-800">{{ $user->first_name }} </div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="font-medium text-gray-800"> {{ $user->middle_name }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="flex items-center">

                                        <div class="font-medium text-gray-800">{{ $user->last_name }}</div>
                                    </div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left">{{ $user->email }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class="text-left font-medium text-green-500">{{ $user->faculty->name }}</div>
                                </td>
                                <td class="p-2 whitespace-nowrap">
                                    <div class=" text-center"> @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $role )
                                        <span class="block my-2   p-1 rounded-lg ">{{ $role }}</span>
                                        @endforeach
                                    @endif
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>





</x-admin-layout>

