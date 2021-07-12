<nav class="bg-gray-800">
    <div class="max-w-7xl mx-auto px-2">
        <div class="relative flex justify-between h-16">
            <div class="flex items-center justify-center">
                <a href="/" class="text-lg text-yellow-400 font-bold">Jobs</a>      
            </div>
            <div class="flex items-center justify-center">
                @guest
                    <a href="{{ route('login') }}" class="text-white">
                        Login
                    </a>
                @endguest
                @auth
                    <p class="text-white mr-2">
                        Welcome, {{ Auth::user()->username }} |
                    </p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-white">Sign out</button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>