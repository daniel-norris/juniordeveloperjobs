<x-layout>
    <div class="min-h-screen container max-auto p-20">
        <form action="{{ route('register') }}" method="POST" class="flex flex-col w-1/5 space-y-8 items-baseline">
        @csrf
            <label for="name">Name</label>
            <input id="name" name="name" type="text">
            <label for="email">Email</label>
            <input id="email" name="email" type="email">
            <label for="password">Password</label>
            <input id="password" name="password" type="password">
            <button type="submit" class="rounded-lg border border-gray-400 py-1 px-2">
                Register
            </button>
        </form>
    </div>
</x-layout>