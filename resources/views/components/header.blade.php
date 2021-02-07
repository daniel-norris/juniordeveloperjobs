<header class="flex bg-gray-600 border border-gray-800 py-8 px-80 shadow-lg justify-between">

    <a href="/" class="text-lg text-yellow-400 font-bold">Junior Developer Jobs</a>

    <div class="flex space-x-8">
        <a href="{{ route('post') }}" class="text-md text-gray-200 hover:underline">Post a Job</a>

        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-md text-gray-200 hover:underline">Logout</button>
            </form>
        @endauth

        @guest  
            <a href="{{ route('login') }}" class="text-md text-gray-200 hover:underline">Login ></a>
        @endguest
    </div>

</header>