<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("You're logged in!") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a class="bg-green-500 p-2 rounded-md text-white" href={{ route('dashboard') }}>Back</a>
                    <div class="relative overflow-x-auto mt-10">

                        <div class="w-full">
                            <form action="{{ route('posts.update', $users->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                              <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                                  Title
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $users->title }}" id="title" name="title" type="text" placeholder="">
                                @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>
                              <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                                  Description
                                </label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  value="{{ $users->description }}" id="description" name="description" type="text" placeholder="">
                                @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            </div>

                              <div class="flex items-center justify-between">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                                  Update Post
                                </button>

                              </div>
                            </form>

                          </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
