<x-app-layout>

    @hasrole('admin')

    @else

        <div class="flex w-full xl:w-1/2 2xl:w-2/5 bg-slate-50 flex-col ">

            <div class="py-10 w-full">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-10">
                                {{ __("UniCESS PROGRAMS AND PROJECTS") }}
                            </h2>
                            <div class="flex flex-col">
                                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                                  <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                    <div class="overflow-hidden">
                                      <table class="min-w-full">
                                        <thead class="border-b">
                                          <tr class="bg-blue-800">
                                            <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-white">
                                              Program Title
                                            </th>
                                            <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-white">
                                              Project Title
                                            </th>
                                            <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-white">
                                              Location
                                            </th>
                                            <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-white">
                                              Date Started
                                            </th>
                                            <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-white">
                                              Date Ended
                                            </th>
                                            <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-white">
                                             Status
                                            </th>
                                            <th scope="col" class="text-sm font-medium  px-6 py-4 text-left text-white">
                                             Option
                                            </th>
                                          </tr>
                                        </thead>
                                        <tbody >
                                          <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> Fitnes and Development</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                             Basketball and Volleyball coaching
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Brgy San Jose Leyte
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                June 20, 1998
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Oct 20, 1999
                                            </td>
                                            <td class="text-sm text-green-800 font-light px-6 py-4 whitespace-nowrap">
                                                Pending
                                            </td>
                                            <td class="text-sm text-blue-800 font-light px-6 py-4 whitespace-nowrap">
                                                Show
                                            </td>
                                          </tr>
                                          <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> Fitnes and Development</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                             Basketball and Volleyball coaching
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Brgy San Jose Leyte
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                June 20, 1998
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Oct 20, 1999
                                            </td>
                                            <td class="text-sm text-green-800 font-light px-6 py-4 whitespace-nowrap">
                                                Pending
                                            </td>
                                            <td class="text-sm text-blue-800 font-light px-6 py-4 whitespace-nowrap">
                                                Show
                                            </td>
                                          </tr>
                                          <tr class="border-b">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> Fitnes and Development</td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                             Basketball and Volleyball coaching
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Brgy San Jose Leyte
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                June 20, 1998
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                Oct 20, 1999
                                            </td>
                                            <td class="text-sm text-green-800 font-light px-6 py-4 whitespace-nowrap">
                                                Pending
                                            </td>
                                            <td class="text-sm text-blue-800 font-light px-6 py-4 whitespace-nowrap">
                                                Show
                                            </td>
                                          </tr>



                                        </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endhasrole

</x-app-layout>
