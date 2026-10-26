<nav class="w-4/5 mx-auto mt-8 mb-8 bg-gradient-to-r from-[#7C3AED] via-[#181818] to-[#7C3AED] rounded-full flex justify-between items-center py-3 px-8 shadow-2xl border-2 border-[#7C3AED]">
    <!-- Logo or Brand -->
    <div class="flex items-center space-x-3">
        <span class="text-white text-xl font-extrabold tracking-widest">GAMEHAVEN</span>
    </div>
    <!-- Navigation Links -->
    <ul class="flex space-x-8">
        <li>
            <a href="/home" class="text-white font-semibold px-4 py-2 rounded-full hover:bg-[#7C3AED] hover:text-white transition duration-200">HOME</a>
        </li>
        <li>
            <a href="/ofertas" class="text-white font-semibold px-4 py-2 rounded-full hover:bg-[#7C3AED] hover:text-white transition duration-200">OFERTAS</a>
        </li>
        <li>
            <a href="/merchandise" class="text-white font-semibold px-4 py-2 rounded-full hover:bg-[#7C3AED] hover:text-white transition duration-200">MERCHANDISE</a>
        </li>
    </ul>
    <!-- Profile Dropdown -->
    <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
            @if(Auth::user() && Auth::user()->profile_picture)
                <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile" class="h-10 w-10 rounded-full border-2 border-[#7C3AED] object-cover shadow">
            @else
                <div class="h-10 w-10 rounded-full bg-[#7C3AED] flex items-center justify-center text-white font-bold text-lg border-2 border-[#7C3AED] shadow">
                    {{ Auth::check() ? strtoupper(substr(Auth::user()->first_name ?? Auth::user()->name, 0, 1)) : 'U' }}
                </div>
            @endif
            <span class="text-white font-semibold hidden md:inline">PERFIL</span>
            <svg class="w-4 h-4 text-white ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </button>
        <!-- Dropdown -->
        <div
            x-show="open"
            @click.away="open = false"
            class="absolute right-0 mt-2 w-56 bg-white rounded-xl shadow-xl z-50 transition"
            x-cloak
        >
            <a href="/profile" class="block px-4 py-2 text-[#7C3AED] hover:bg-[#f3e8ff] font-semibold rounded-t-xl transition text-center">Ver Perfil</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 text-[#7C3AED] hover:bg-[#f3e8ff] font-semibold rounded-b-xl transition text-center">
                    Logout
                </button>
            </form>
        </div>
    </div>
    <!-- Alpine.js for dropdown -->
    <script src="//unpkg.com/alpinejs" defer></script>
</nav>