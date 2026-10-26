<header class="flex items-center justify-between gap-3 md:gap-0 py-2 md:py-4">
    <div class="shrink-0 md:w-1/4">
        <img src="{{ asset('images/gamehavenlogo.webp') }}" width="400" height="400" fetchpriority="high" alt="GameHaven Logo" class="h-20 md:h-[11rem] w-auto max-w-none">
    </div>
    <div class="min-w-0 flex-1 md:flex-none md:w-1/2 relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="default-search" aria-label="Pesquisar" class="block w-full p-3 md:p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search" required>
    </div>
    <div class="shrink-0 md:w-1/4 flex justify-end">
        <a href="{{ route('cart.index') }}" class="group" aria-label="Carrinho">
            <!-- Shopping cart icon using Blade Icons -->
            <x-akar-cart class="w-8 h-8 text-white hover:text-[#7C3AED] transition" />
        </a>
    </div>
</header>
