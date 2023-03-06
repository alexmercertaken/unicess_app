<div>
    {{--  @include('livewire.usermodal')  --}}

    <div class="antialiased pt-10 ">
        <div class="">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif
                <div class="w-full  mx-auto bg-white shadow-lg rounded-lg border border-gray-200">
                    <div class="px-5 py-4 border-b border-gray-100">
                        <h4 class="mb-5">ALl USER DATA</h4>
                        <div class=" flex justify-between">





                                    <div class="">
                                    <label for="paginate" class="text-xs">Per Page</label>
                                    <select wire:model="paginate" name="paginate" id="paginate" class="text-xs rounded border-slate-200">
                                        <option value="10">10</option>
                                        <option value="50">50</option>
                                        <option value="70">70</option>
                                    </select>
                                    </div>

                                    <div class="text-sm">
                                    <input type="text" name="search" wire:model.debounce.500ms="search" id="search" class="xl:text-sm border-slate-500 rounded" placeholder="Search...">


                                    <select name="" id="" class="border-slate-200 xl:text-sm rounded" wire:model="selectedFaculty">
                                        @foreach ($faculties as $id => $name )
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>

                                    <select wire:model="authorizing" name="authorizing" id="authorizing"  class="border-slate-200 xl:text-sm rounded ">
                                        <option value="">All Authorize</option>
                                        <option value="1">Approved</option>
                                        <option value="2">Declined</option>
                                    </select>


                                </div>



                        </div>

                        {{--  <button type="button" class="btn btn-primary bg-blue-500 float-start" data-bs-toggle="modal" data-bs-target="#userModal">
                            Add-new-user
                        </button>  --}}

                    </div>

                    <div class="overflow-x-auto p-2 rounded ">
                        <table class="table-auto w-full border-collapse  ">

                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th class="p-2 whitespace-nowrap">First Name</th>
                                    <th class="p-2 whitespace-nowrap">Middle Name</th>
                                    <th class="p-2 whitespace-nowrap">Last Name</th>
                                    <th class="p-2 whitespace-nowrap">Gender</th>
                                    <th class="p-2 whitespace-nowrap">Email</th>
                                    <th class="p-2 whitespace-nowrap">Address</th>
                                    <th class="p-2 whitespace-nowrap">Contact</th>
                                    <th class="p-2 whitespace-nowrap">Faculty Name</th>
                                    <th class="p-2 whitespace-nowrap">Role</th>
                                    <th class="p-2 whitespace-nowrap">Authorize</th>
                                    <th class="p-2 whitespace-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody class="">
                                @forelse ($users as $user )
                                    <tr class="xl:text-xs 2xl:text-sm  border-b  dark:border-gray-500 text-gray-600">
                                       
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="text-center">
                                            <div>{{ $user->first_name }}</div>
                                            </div>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="text-center">
                                                <div> {{ $user->middle_name }}</div>
                                            </div>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="text-center">
                                            <div>{{ $user->last_name }}</div>
                                            </div>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="text-center">
                                            <div>{{ $user->gender }}</div>
                                            </div>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="text-center">
                                            <div> {{ Str::limit($user->email ,10) }}</div>
                                            </div>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="text-center">
                                            <div> {{ Str::limit($user->address ,10) }}</div>
                                            </div>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="text-center">
                                            <div> {{ Str::limit($user->contact_number ,6) }}</div>
                                            </div>
                                        </td>
                                        <td class="p-3 whitespace-nowrap">
                                            <div class="text-center">
                                            <div> {{ $user->faculty == null ? 'Beneficiary/Partners' : $user->faculty->name }}</div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="text-center">
                                            @if (!empty($user->getRoleNames()))
                                               @foreach ($user->getRoleNames() as $role )
                                                   <span class="block">{{ $role }}</span>
                                               @endforeach
                                           @endif
                                            </div>
                                       </td>

                                       <td>
                                        <div class="text-center">
                                        @if ($user->authorize == '2')
                                            <span class="text-red-300">declined</span>
                                        @elseif($user->authorize == '1')
                                            <span class="text-green-500">approved</span>
                                        @else($user->authorize == '0')
                                            <span class="text-red-600">pending</span>
                                        @endif
                                        </div>
                                        </td>

                                        <td class=" space-x-1 flex xl:flex-row  xl:items-center ">
                                            <a class="rounded-md p-1 text-white bg-blue-500" href={{ route('admin.users.show', $user->id) }}>Edit </a>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm ('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="mt-2" href="">
                                                    <svg class="fill-red-500" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 96 960 960" width="30"><path d="M261 936q-24.75 0-42.375-17.625T201 876V306h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438V306ZM367 790h60V391h-60v399Zm166 0h60V391h-60v399ZM261 306v570-570Z"/></svg>
                                                </button>
                                                </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr colspan="12" ><td class="text-lg"><h1 class="text-red-500">No Record Found</h1></td></tr>

                                @endforelse
                            </tbody>
                        </table>
                        <div class="p-2">{{ $users->links() }}</div>
                    </div>

                </div>
            </div>

        </div>
    </div>


</div>



