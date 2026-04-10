<nav class="fixed top-0 left-0 w-full z-50 glass-panel border-b border-slate-800">
    <div class="container mx-auto px-4 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="text-2xl font-bold">
                Moto<span class="text-blue-500">Kredit</span>
            </a>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'text-blue-400' : 'text-slate-300 hover:text-white' }} transition">
                    Beranda
                </a>
                <a href="{{ route('catalog') }}" class="nav-item {{ request()->routeIs('catalog') ? 'text-blue-400' : 'text-slate-300 hover:text-white' }} transition">
                    Daftar Motor
                </a>
                <a href="{{ route('about') }}" class="nav-item {{ request()->routeIs('about') ? 'text-blue-400' : 'text-slate-300 hover:text-white' }} transition">
                    Tentang
                </a>
            </div>

            <!-- Auth Actions -->
            <div id="nav-guest-actions" class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="px-4 py-2 text-blue-400 hover:text-blue-300">Masuk</a>
                <a href="{{ route('register') }}" class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-500">Daftar</a>
            </div>

            <div id="nav-user-actions" class="hidden flex items-center space-x-4">
                <span class="text-sm bg-blue-500/20 px-3 py-1 rounded-full">
                    <i class="fa-solid fa-user"></i> <span id="user-role-badge"></span>
                </span>
                <button onclick="logout()" class="px-4 py-2 bg-red-600/20 text-red-400 rounded-lg hover:bg-red-600/30">
                    Logout
                </button>
            </div>
        </div>
    </div>
</nav>