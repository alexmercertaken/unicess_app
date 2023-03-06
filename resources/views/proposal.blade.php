<x-app-layout>


<div class="flex w-full bg-slate-50 flex-col">
    <div class="py-12 w-full">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                @can('create-blog-posts')
                <a href={{ route('posts.create') }} class="bg-blue-500 p-2 my-5 text-white rounded-md" >Create Post</a>
                @endcan


                <div class="relative overflow-x-auto mt-10">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                      <tr>
                        <th class="px-6 py-4" >title</th>
                        <th class="px-6 py-4">description</th>
                        @can('edit-blog-posts')
                        <th class="px-6 py-4">option </th>
                        @endcan
                      </tr>
                    </thead>
                    @foreach ($posts as $post )
                    <tbody>
                      <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $post->title }}</td>
                        <td class="px-6 py-4">{{ $post->description }}</td>


                        <td class="flex space-x-2">
                            @can('edit-blog-posts')
                            <a class="bg-blue-500 p-2 my-5 text-white rounded-md" href={{ route('posts.edit', $post->id) }}>Edit</a>
                            @endcan

                            @can('delete-blog-posts')
                            <form action="{{ route('posts.delete', $post->id) }}" method="POST" onsubmit="return confirm ('Are you sure?')">
                                @csrf
                                @method('DELETE')
                            <div>
                                <button type="submit" class="bg-red-500 p-2 my-5 text-white rounded-md" href="">Delete</button>
                            </div>
                                </form>
                            @endcan
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




<x-messages/>

</x-app-layout>
