<x-layout>
    <div class="min-h-screen p-6">
        <form method="POST" action="/login" class="flex flex-col w-60 items-baseline space-y-4">
            @csrf
            <label for="email">Email</label>
            <input name="email" type="text">

            <label for="password">Password</label>
            <input name="password" type="password">

            <button type="submit" class="border border-gray-800 py-1 px-3 rounded-lg hover:text-white hover:bg-gray-600">
                Login
            </button>
        </form>
    </div>

</x-layout>
