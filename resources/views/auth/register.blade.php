@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<x-layout>
    <div class="container mx-auto p-6 space-y-6">
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Personal Information</h3>
                    <p class="mt-1 text-sm text-gray-500">
                        This helps us to better match opportunities to you.
                    </p>
                </div>

                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form id="register" action="/register" method="POST" x-data="{ isShowing: false }">
                        @csrf

                        <div class="grid grid-cols-6 gap-6">

                            <div class="col-span-6 sm:col-span-4">
                                <label for="user_type" class="block text-sm font-medium text-gray-700">I'm a...</label>
                                <select id="user_type" name="user_type" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" x-on:change="isShowing = $event.target.value">
                                    <option value="candidate">Candidate</option>
                                    <option value="recruiter">Recruiter</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="forename" class="block text-sm font-medium text-gray-700">Forename</label>
                                <input type="text" name="forename" id="forename" autocomplete="forename" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="surname" class="block text-sm font-medium text-gray-700">Surname</label>
                                <input type="text" name="surname" id="surname" autocomplete="surname" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                                <input type="text" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6">
                                <label for="bio" class="block text-sm font-medium text-gray-700">
                                    Bio
                                </label>
                                <div class="mt-1">
                                    <textarea id="bio" name="bio" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="you@example.com"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Brief description for your profile. URLs are hyperlinked.
                                </p>
                            </div>

                            <div class="col-span-6 sm:col-span-3" x-show="isShowing === 'recruiter'">
                                <label for="company_name" class="block text-sm font-medium text-gray-700">Company name</label>
                                <input type="text" name="company_name" id="company_name" autocomplete="company_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3" x-show="isShowing === 'recruiter'">
                                <label for="company_registered_name" class="block text-sm font-medium text-gray-700">Company registered name</label>
                                <input type="text" name="company_registered_name" id="company_registered_name" autocomplete="company_registered_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6">
                                <label for="address_1" class="block text-sm font-medium text-gray-700">Building no.</label>
                                <input type="text" name="address_1" id="address_1" autocomplete="address_1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6">
                                <label for="address_2" class="block text-sm font-medium text-gray-700">Street address</label>
                                <input type="text" name="address_2" id="address_2" autocomplete="address_2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                <input type="text" name="city" id="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="state" class="block text-sm font-medium text-gray-700">State</label>
                                <input type="text" name="state" id="state" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                                <label for="postcode" class="block text-sm font-medium text-gray-700">Postcode</label>
                                <input type="text" name="postcode" id="postcode" autocomplete="postcode" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-3">
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <select id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option>United Kingdom</option>
                                    <option>United States</option>
                                    <option>Canada</option>
                                </select>
                            </div>

                            <div class="col-span-6 sm:col-span-4" x-show="isShowing === 'recruiter'">
                                <label for="company_email" class="block text-sm font-medium text-gray-700">Company email address</label>
                                <input type="text" name="company_email" id="company_email" autocomplete="company_email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4" x-show="isShowing === 'recruiter'">
                                <label for="company_phone" class="block text-sm font-medium text-gray-700">Company phone number</label>
                                <input type="text" name="company_phone" id="company_phone" autocomplete="company_phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4" x-show="isShowing === 'recruiter'">
                                <label for="company_url" class="block text-sm font-medium text-gray-700">Company url</label>
                                <input type="text" name="company_url" id="company_url" autocomplete="company_url" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <input type="password" name="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                            <div class="col-span-6 sm:col-span-4">
                                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Cancel
            </button>
            <button type="submit" form="register" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Register
            </button>
        </div>
    </div>
    
</x-layout>
