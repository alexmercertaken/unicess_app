<x-admin-layout>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    <div class="p-6 text-gray-900 flex  justify-between">
                        <h1 class="text-gray-400">User account detail</h1>
                       <a class="bg-green-400 px-2 py-1 rounded-lg text-white hover:bg-green-700" href={{ route('admin.users.main') }}>Back</a>
                    </div>

                    <div class="flex xl:flex-row w-full p-5 space-x-2">
                   
                 

                    <div class=" w-full">
                        <div class="space-y-2">
                       <h1 class="text-md font-semibold text-gray-700">First name: <span class="font-bold text-lg text-black">{{ $user->first_name }} </span> </h1>
                       <h1 class="text-md font-semibold text-gray-700"> Middle name: <span class="font-bold text-lg text-black">{{ $user->middle_name }} </span>  </h1 class="text-md font-bold">
                       <h1 class="text-md font-semibold text-gray-700"> Last name: <span class="font-bold text-lg text-black">{{ $user->last_name }} </span>  </h1 class="text-md font-bold">
                       <h1 class="text-md font-semibold text-gray-700"> Email: <span class="font-bold text-lg text-black">{{ $user->email }} </span>  </h1 class="text-md font-bold">
                       <h1 class="text-md font-semibold text-gray-700"> Gender: <span class="font-bold text-lg text-black">{{ $user->gender }} </span>  </h1 class="text-md font-bold">
                       <h1 class="text-md font-semibold text-gray-700"> Address: <span class="font-bold text-lg text-black">{{ $user->address }} </span>  </h1 class="text-md font-bold">
                       <h1 class="text-md font-semibold text-gray-700"> Contact: <span class="font-bold text-lg text-black">{{ $user->contact_number }} </span>  </h1 class="text-md font-bold">
                     
                       <h1 class="text-md font-semibold text-gray-700">Faculty:{{ $user->faculty == null ? 'Beneficiary/Partners' : $user->faculty->name }}</h1>
                        

                                <h1>Authorize:
                                    @if ($user->authorize == '0')
                                    <span class="text-red-500">pending</span>
                            @elseif ($user->authorize == '1')
                                <span class="text-green-500">approved</span>
                                @elseif ($user->authorize == '2')
                                    <span class="text-red-600">declined</span>
                            @endif
                            </h1>


                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">

                                @csrf
                                @method('PATCH')
                            <div class="flex flex-col  w-1/4 space-y-1">
                            <input class="shadow appearance-none border rounded text-green-500 leading-tight focus:outline-none focus:shadow-outline" id="authorize" name="authorize" type="checkbox" placeholder=""
                            {{ $editauthorize->authorize == '1' ? 'checked': '2' }}>

                            <button type="submit" class="bg-blue-700 text-white rounded-md p-1">update authorize</button>

                            </div>
                            </form>
                         </div>
                        </div>



                <div class=" w-full">
                         {{--  Role and Permission Start --}}
                <div class=" pt-2">
                    <h2 class="text-2xl font-bold">Edit Role</h2>
                </div>

                <div class="mt-10">

                @if ($user->roles)
                    @foreach ($user->roles as $user_role )

                        <form action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}" method="POST" onsubmit="return confirm ('Are you sure?')">
                            @csrf
                            @method('DELETE')
                        <div>
                            <button type="submit" class="text-red-500" href="">{{ $user_role->name }}</button>
                        </div>
                            </form>

                    @endforeach
                @endif
                </div>
                {{--  Role and Permission End --}}



                <form action="{{ route('admin.users.roles', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-6 mt-5">
                    <label for="role" class="form-label inline-block mb-2 text-gray-700"> Roles</label>
                    <select id="role" name="role" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded
                        transition ease-in-ou m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">@error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        <option disabled selected value="disabled">Select role</option>
                        @foreach ($roles as $role )
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    </div>


                    <div class="form-group mb-6">
                    <button type="submit" class=" w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs
                    leading-tight
                    uppercase
                    rounded
                    shadow-md
                    hover:bg-blue-700 hover:shadow-lg
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
                    active:bg-blue-800 active:shadow-lg
                    transition
                    duration-150
                    ease-in-out">Assign Permission</button>

                    </form>
                </div>
{{--  -------------------------------------------------------------------------------------------------------  --}}
                {{--  Role and Permission Start --}}
                {{--  <div class="mt-20 pt-2">
                    <h2 class="text-3xl font-bold">Permissions</h2>
                </div>

                <div class="mt-10">

                @if ($user->permissions)
                    @foreach ($user->permissions as $user_permission )

                        <form action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}" method="POST" onsubmit="return confirm ('Are you sure?')">
                            @csrf
                            @method('DELETE')
                        <div>
                            <button type="submit" class="text-red-500" >{{ $user_permission->name }}</button>
                        </div>
                            </form>

                    @endforeach
                @endif
                </div>  --}}
                {{--  Role and Permission End --}}



                {{--  <form action="{{ route('admin.users.permissions', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group mb-6 mt-5">
                    <label for="permission" class="form-label inline-block mb-2 text-gray-700"> Permission</label>
                    <select id="permission" name="permission" class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded
                        transition ease-in-ou m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none">@error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        <option disabled selected value="disabled">Select permission</option>
                        @foreach ($permissions as $permission )
                        <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                     </select>
                    </div>


                    <div class="form-group mb-6">
                    <button type="submit" class=" w-full px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded
                    shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg
                    transition duration-150 ease-in-out">Assign Permission</button>
                </form>
              </div>
                    </div>  --}}

           </div>
         </div>
        </div>
       <x-messages/>
  
</x-admin-layout>
