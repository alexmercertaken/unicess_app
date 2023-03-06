<x-admin-layout>

    <div class="w-full bg-white rounded-lg mt-10  drop-shadow-md p-5">
        <h1 class="mb-2">List of Proposal</h1>

        <div class="flex flex-wrap justify-center p-10">
        @foreach ($program as $name)
             <div class="drop-shadow-md bg-white drop-shadow-md p-10 rounded-lg m-3 w-full lg:w-40  xl:w-52 2xl:w-60 hover:bg-slate-200 relative">
             <span class="absolute w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 h-2 top-0 left-0"></span>
                <a href={{route('admin.proposal.show', $name->id)}} class="text-lg 2xl:text-lg xl:text-md lg:text-sm font-semibold">{{ $name->program}}</a>
            </div>
        @endforeach
        </div>
    </div>
</x-admin-layout>
