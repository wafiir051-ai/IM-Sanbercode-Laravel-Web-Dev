<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'InvestoryApp') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .sidebar-transition { transition: width 0.3s ease; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
       
        <aside id="sidebar" class="bg-white shadow-lg sidebar sidebar-transition flex flex-col overflow-hidden" style="width: 16rem;">
            
            <div class="p-6 flex items-center">
                <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                    <span class="text-white font-bold">I</span>
                </div>
                <span class="text-xl font-bold text-gray-800">InvestoryApp</span>
            </div>

          
            <nav class="mt-2 px-4 flex-1 overflow-y-auto">
                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Home</div>
                <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('dashboard') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-blue-50' }} rounded-lg mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    Dashboard
                </a>

                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">Inventory</div>
                <a href="{{ route('products.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('products.*') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-blue-50' }} rounded-lg mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    Products
                </a>
                <a href="{{ route('categories.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('categories.*') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-blue-50' }} rounded-lg mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                    Categories
                </a>
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('staff'))
                <a href="{{ route('transactions.index') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('transactions.*') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-blue-50' }} rounded-lg mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
                    Transactions
                </a>
                @endif

                <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mt-6 mb-2">Settings</div>
                <a href="{{ route('profile.show') }}" class="flex items-center px-4 py-3 {{ request()->routeIs('profile.*') ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-blue-50' }} rounded-lg mb-1 transition">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    My Profile
                </a>
            </nav>

            
            <div class="p-4 border-t border-gray-200 bg-gray-50">
                <div class="flex items-center px-4 py-3 mb-3">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                        @if(Auth::user()->profile && Auth::user()->profile->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->profile->avatar) }}" class="w-10 h-10 rounded-full object-cover">
                        @else
                            <span class="text-blue-600 font-bold">{{ substr(Auth::user()->name, 0, 1) }}</span>
                        @endif
                    </div>
                    <div class="overflow-hidden">
                        <p class="text-sm font-medium text-gray-900 truncate">{{ Auth::user()->name }}</p>
                        <p class="text-xs text-gray-500">
                            @if(Auth::user()->hasRole('admin'))
                                Admin
                            @elseif(Auth::user()->hasRole('staff'))
                                Staff
                            @else
                                User
                            @endif
                        </p>
                    </div>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg transition">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

      
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-8 py-4">
                    <div class="flex items-center space-x-3">
                       
                        <button id="sidebarToggle" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800">
                            {{ $header ?? 'Dashboard' }}
                        </h2>
                    </div>
                    <div class="flex items-center">
                     
                        <div id="real-time-clock" class="text-sm text-gray-500">
                            {{ now()->format('l, d M Y H:i:s') }}
                        </div>
                    </div>
                </div>
            </header>

            
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-8">
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    <script>
        
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarToggle');
        const sidebarWidth = 256; 

        function setSidebarState(open) {
            if (open) {
                sidebar.style.width = sidebarWidth + 'px';
                localStorage.setItem('sidebar', 'open');
            } else {
                sidebar.style.width = '0';
                localStorage.setItem('sidebar', 'closed');
            }
        }

        toggleBtn.addEventListener('click', function() {
            const isOpen = sidebar.style.width !== '0px' && sidebar.style.width !== '';
            setSidebarState(!isOpen);
        });

       
        const savedState = localStorage.getItem('sidebar');
        if (savedState === 'closed') {
            setSidebarState(false);
        } else {
            setSidebarState(true); 
        }

        
        function updateClock() {
            const now = new Date();
            const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            
            const dayName = days[now.getDay()];
            const day = now.getDate();
            const month = months[now.getMonth()];
            const year = now.getFullYear();
            const hours = now.getHours().toString().padStart(2, '0');
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            
            const dateString = `${dayName}, ${day} ${month} ${year} ${hours}:${minutes}:${seconds}`;
            document.getElementById('real-time-clock').innerText = dateString;
        }
        
        updateClock();
        setInterval(updateClock, 1000);
    </script>
</body>
</html>