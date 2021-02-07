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
            <label for="password_confirmation">Confirm Password</label>
            <input id="password_confirmation" name="password_confirmation" type="password">
            <button type="submit" class="rounded-lg border border-gray-400 py-1 px-2">
                Register
            </button>
        </form>

        @if ($errors->any())
            <div class="mt-8">
                <ul class="space-y-4">
                    @foreach ($errors->all() as $error)
                    <li class="text-red-500 text-xs">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</x-layout>