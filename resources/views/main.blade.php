<x-layout>
    <main class="container mx-auto flex-grow py-16">

        <div class="flex flex-col h-80 items-center justify-center">
            <form action="/jobs" class="flex flex-col w-1/3">
                <label aria-label="search" for="search"></label>
                <input class="py-2 px-4 rounded-lg shadow-md" type="text" id="search" name="search" placeholder="Search for your dream job now...">
            </form>
            @if ($errors->any())
            <div class="text-xs text-red-500 mt-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif 
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

                            @isset($data)

                                @foreach ($data as $company)

                                    <tr class="hover:bg-yellow-50">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 rounded-full" src="{{ asset($company->logo) }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                {{ $company->adverts[0]->title }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                {{ $company->adverts[0]->reference }}
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $company->name_registered }}</div>
                                            <div class="text-sm text-gray-500">Core</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $company->adverts[0]->city . ', ' . $company->adverts[0]->country }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ '£' . $company->adverts[0]->min_salary . ' - ' . '£' . $company->adverts[0]->max_salary }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="#" class="text-yellow-600 hover:text-yellow-900">Apply</a>
                                        </td>
                                    </tr>

                                @endforeach
                        
                            @endisset

                        </tbody>
                    </table>
                        
                   

                </div>
            </div>

            @if (count($data) === 0)
        
                <p class="ml-4 text-sm text-gray-900">No jobs match that description. Try searching for something else.</p>
    
            @endif

        </div>

    </main>
</x-layout>