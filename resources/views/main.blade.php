<x-layout>
    <main class="container mx-auto flex-grow py-16">
        <div class="flex h-80 items-center justify-center">
            <form action="/jobs" class="flex flex-col w-1/3">
                <label aria-label="search" for="search"></label>
                <input class="py-2 px-4 rounded-lg shadow-md" type="text" id="search" name="search" placeholder="Search for your dream job now...">
            </form>
        </div>

        <div class="-my-2 overflow-x-auto">
            <div class="py-2 align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Job
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Company
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Location
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Salary
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Apply</span>
                            </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">

                            @isset($adverts)

                                @foreach ($adverts as $advert)

                                    <tr class="hover:bg-purple-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="{{ asset('images/spotify.png') }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                {{ $advert->title }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                {{ $advert->reference }}
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">??</div>
                                            <div class="text-sm text-gray-500">??</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <!-- <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Active
                                            </span> -->
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $advert->address_1 . ', ' . $advert->city . ', ' . $advert->country }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $advert->min_salary . ' - ' . $advert->max_salary }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Apply</a>
                                        </td>
                                    </tr>

                                @endforeach
                        
                            @endisset

                        </tbody>
                    </table>
                        
                   

                </div>
            </div>
        </div>

    </main>
</x-layout>