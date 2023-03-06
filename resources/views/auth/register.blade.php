<x-guest-layout>
<div class="xl:w-full p-5 xl:p-5 2xl:w-3/4 2xl:p-10   rounded-md bg-white">
    <form method="POST" action="{{ route('register') }}">
        @csrf


        <div class="xl:space-y-0 space-y-2">
            <div class=" mb-3 xl:flex xl:flex-row lg:flex-row lg:flex lg:justify-between lg:items-center xl:justify-between xl:items-center ">
                <h1 class="xl:text-xl text-3xl lg:text-sm lg:font-bold ">Register Account</h1>
                <h3 class="text-gray-500 xl:text-xs lg:text-xs">Please register account credentials to proceed</h3>
            </div>

        {{--  Select start here  --}}
            <!-- Select Button -->

            <div class="w-full">
                <x-input-label class="lg:text-xs" for="role" :value="__('Select Role')" />
                @php

                    $faculty_extensionist = Spatie\Permission\Models\Role::whereIn('name', ['Faculty extensionist'])->get();
                    $extenionist_coordinator = Spatie\Permission\Models\Role::whereIn('name', ['Extension coordinator'])->get();
                    $partners = Spatie\Permission\Models\Role::whereIn('name', ['Partners/Linkages'])->get();
                    $beneficiary = Spatie\Permission\Models\Role::whereIn('name', ['Beneficiary'])->get();

                @endphp
                <select onchange="yesnoCheck(this);" id="role" class="md:text-xs lg:text-xs xl:text-sm mt-1 w-full rounded-md shadow-sm border-gray-300 text-gray-900" type="text" name="role" :value="old('role')" required autofocus autocomplete="role">
                    <option disabled selected value="disabled">Register as:</option>
                    @foreach ($faculty_extensionist as $fac_ext )
                    <option value="Faculty extensionist" {{ $fac_ext->name }} > {{ $fac_ext->name }}</option>
                    @endforeach
                    @foreach ($extenionist_coordinator as $ext_coor )
                    <option value="Extension coordinator" {{ $ext_coor->name }} > {{ $ext_coor->name }}</option>
                    @endforeach
                    @foreach ($partners as $partner )
                    <option value="Partners/Linkages" {{ $partner->name }} > {{ $partner->name }}</option>
                    @endforeach
                    @foreach ($beneficiary as $benefits )
                    <option value="Beneficiary" {{ $benefits->name }}  > {{ $benefits->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('role')" class="mt-2" />
                <x-input-error :messages="$errors->get('faculty_id')" class="mt-2" />
            </div>
        </div>
        {{--  End of Select   --}}



        @php
        $faculties = App\Models\Faculty::orderBy('name')->pluck('name', 'id');
        @endphp


        <div class="mt-4 w-full" id="faculties"  style="display: none;">
            <x-input-label class="lg:text-xs" for="faculty_id" :value="__('Faculty Name')" />
            <select id="faculty_id" class="lg:text-xs xl:text-sm block mt-1 w-full rounded-md shadow-sm border-gray-300 text-gray-900 " type="text" name="faculty_id" :value="old('faculty_id')"  autofocus autocomplete="faculty_id">
                <option disabled selected="" >Select Faculty:</option>
                @foreach ($faculties as $id => $name )
                <option value="{{ $id }}">{{ $name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('faculty_id')" class="mt-2" />
        </div>


        <div class="mt-4 w-full" id="beneficiaries"  style="display: none;" value= "">
            {{--  <select id="faculty" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 text-gray-900 " type="text" name="faculty" :value="old('faculty')" required autofocus autocomplete="faculty">
                <option disabled selected="" >Beneficiary</option>
            </select>  --}}
        </div>

        <div class="mt-4 w-full" id="partners"  style="display: none;" value= "">
            {{--  <select id="faculty" class="block mt-1 w-full rounded-md shadow-sm border-gray-300 text-gray-900 " type="text" name="faculty" :value="old('faculty')" required autofocus autocomplete="faculty">
                <option disabled selected="" >Partners</option>
            </select>  --}}
        </div>


        <!-- First Name -->
        <div class="mt-2 lg:flex lg:space-x-3 ">
            <div class="w-full">
                <x-input-label class="lg:text-xs" for="first_name" :value="__('First Name')" />
                <x-text-input id="first_name" class="lg:text-xs xl:text-sm block  w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>


        <!--Middle Name -->
        <div class="w-full">
            <x-input-label class="lg:text-xs" for="middle_name" :value="__('Middle Name')" />
            <x-text-input id="middle_name" class="lg:text-xs xl:text-sm block  w-full" type="text" name="middle_name" :value="old('middle_name')" required autofocus autocomplete="middle_name" />
            <x-input-error :messages="$errors->get('middle_name')" class="mt-2" />
        </div>

        <!--Last Name -->
        <div class="w-full">
            <x-input-label class="lg:text-xs" for="last_name" :value="__('Last Name')" />
            <x-text-input id="last_name" class="lg:text-xs xl:text-sm block  w-full" type="text" name="last_name" :value="old('last_name')" required autofocus autocomplete="last_name" />
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
        </div>

        </div>

        <div class="flex space-x-3">

        @php
            $users = App\Models\User::where('gender' ,'Male')->get();
        @endphp
        <!-- Gender -->
        <div class="mt-4 w-full xl:w-96">
            <x-input-label class=" lg:text-xs" for="gender" :value="__('Gender')" />
            <select name="gender" id="gender" class="md:text-xs lg:text-xs xl:text-sm block  w-full rounded-md shadow-sm border-gray-300 text-gray-900" type="text" name="gender" :value="old('gender')" required autocomplete="gender" >
                <option  class="sm:text-xs md:text-xs lg:text-xs xl:text-md text-sm" selected="" disabled >Choose a gender</option>
                <option  value="Male">Male</option>
                <option  value="Female">Female</option>
            </select>

            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>
       

         <!-- Email -->
         <div class="mt-4 w-full">
            <x-input-label class="lg:text-xs" for="email" :value="__('Email')" />
            <x-text-input id="email" class="lg:text-xs xl:text-sm block  w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


            <!-- Contact -->
            <div class="mt-4 w-full">
                <x-input-label class="lg:text-xs" for="contact_number" :value="__('Contact Number')" />
                <x-text-input id="contact_number" class="lg:text-xs xl:text-sm block  w-full" type="text" name="contact_number" :value="old('contact_number')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('contact_number')" class="mt-2" />
            </div>
        </div>

        <div class=" lg:flex lg:space-x-3 ">
           
             <!-- Address -->
        <div class="mt-4 w-full">
            <x-input-label class="lg:text-xs" for="address" :value="__('Address')" />
            <x-text-input id="address" class="lg:text-xs xl:text-sm block  w-full" type="text" name="address" :value="old('address')" required autocomplete="address" />
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

          
        </div>

        <div class="xl:flex xl:flex-row xl:space-x-3  lg:space-x-0 sm:flex-col sm:space-x-0 md:flex-col md:space-x-0">
        <!-- Password -->
        <div class="mt-4 w-full">
            <x-input-label class="lg:text-xs" for="password" :value="__('Password')" />

            <x-text-input id="password" class="lg:text-xs xl:text-sm block  w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 w-full">
            <x-input-label class="lg:text-xs" for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class=" lg:text-xs xl:text-sm block  w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
    </div>

        <div class="flex items-center justify-end  flex-col ">


            <x-primary-button class="lg:text-xs w-full my-4 xl:text-sm">
                {{ __('Register') }}
            </x-primary-button>


            <a class="xl:text-sm underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
        </div>
    </form>
</div>


    <script type="text/javascript">



        function yesnoCheck(that) {
            if (that.value == 'Faculty extensionist') {
                 console.log("faculty-check");
                document.getElementById("faculties").style.display = "block";
                document.getElementById("partner").style.display = "none";
                document.getElementById("beneficiaries").style.display = "none";

                var fac = document.getElementById("faculty_id").value == 'Select Faculty';
                console.log(fac);


            }else if (that.value == "Extension coordinator") {
                console.log("partners-check");
                document.getElementById("faculties").style.display = "block";
                document.getElementById("partner").style.display = "none";
                document.getElementById("beneficiaries").style.display = "none";


            }
            else if (that.value == "Partners/Linkages") {
                console.log("partners-check");
                document.getElementById("partners").style.display = "block";
                document.getElementById("faculties").style.display = "none";
                document.getElementById("beneficiaries").style.display = "none";

                var part = document.getElementById("faculty_id").value = null;
                console.log(part);
        }
            else if (that.value == "Beneficiary") {
                console.log("beneficiary-check");
                 document.getElementById("beneficiaries").style.display = "block";
                 document.getElementById("faculties").style.display = "none";
                 document.getElementById("partners").style.display = "none";

                var fac = document.getElementById("faculty_id").value = null;
                console.log(fac);



        }

    }




</script>
</x-guest-layout>
