<x-app-layout>
    <x-slot name="header">
        My Profile
    </x-slot>

    <div class="max-w-5xl mx-auto">

        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            
            <div class="h-32 bg-gradient-to-r 
                {{ Auth::user()->hasRole('admin') ? 'from-red-500 to-pink-600' : 
                   (Auth::user()->hasRole('staff') ? 'from-yellow-500 to-orange-500' : 
                    'from-blue-500 to-indigo-600') }}">
            </div>

         
            <div class="px-8 pb-8">
          
                <div class="flex flex-col md:flex-row items-start md:items-end -mt-14 mb-8">
                    <div class="relative">
                        <div class="w-28 h-28 rounded-2xl bg-white p-1.5 shadow-xl">
                            @if(Auth::user()->profile && Auth::user()->profile->avatar)
                                <img src="{{ asset('storage/' . Auth::user()->profile->avatar) }}" 
                                     class="w-full h-full rounded-xl object-cover">
                            @elseif(Auth::user()->avatar)
                                <img src="{{ Auth::user()->avatar }}" 
                                     class="w-full h-full rounded-xl object-cover">
                            @else
                                <div class="w-full h-full rounded-xl bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center">
                                    <span class="text-4xl font-bold text-blue-600">
                                        {{ substr(Auth::user()->name, 0, 1) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                  
                        <div class="absolute bottom-2 right-2 w-4 h-4 bg-green-400 border-2 border-white rounded-full"></div>
                    </div>
                    <div class="mt-4 md:mt-0 md:ml-6 flex-1">
                        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                            <div>
                                <h2 class="text-2xl font-bold text-gray-800">{{ Auth::user()->name }}</h2>
                                <p class="text-gray-500">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="mt-3 md:mt-0">
                                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium shadow-sm
                                    {{ Auth::user()->hasRole('admin') ? 'bg-red-100 text-red-800 border border-red-200' : 
                                       (Auth::user()->hasRole('staff') ? 'bg-yellow-100 text-yellow-800 border border-yellow-200' : 
                                        'bg-blue-100 text-blue-800 border border-blue-200') }}">
                                    {{ Auth::user()->hasRole('admin') ? 'Administrator' : 
                                       (Auth::user()->hasRole('staff') ? 'Staff' : 'Member') }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

             
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-8">
                    <div class="bg-gray-50 rounded-xl p-4 text-center border border-gray-100">
                        <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Product::count() }}</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wider">Total Products</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 text-center border border-gray-100">
                        <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Category::count() }}</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wider">Categories</p>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 text-center border border-gray-100">
                        <p class="text-2xl font-bold text-gray-800">{{ \App\Models\Transaction::count() }}</p>
                        <p class="text-xs text-gray-500 uppercase tracking-wider">Transactions</p>
                    </div>
                </div>

               
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Informasi Pribadi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                  
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 hover:border-blue-200 transition group">
                        <div class="flex items-center text-gray-400 group-hover:text-blue-500 mb-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Phone</span>
                        </div>
                        <p class="text-gray-800 font-medium text-lg">{{ Auth::user()->profile->phone ?? '-' }}</p>
                    </div>

                 
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 hover:border-blue-200 transition group">
                        <div class="flex items-center text-gray-400 group-hover:text-blue-500 mb-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Gender</span>
                        </div>
                        <p class="text-gray-800 font-medium text-lg">
                            {{ Auth::user()->profile && Auth::user()->profile->gender ? ucfirst(Auth::user()->profile->gender) : '-' }}
                        </p>
                    </div>

               
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 hover:border-blue-200 transition group">
                        <div class="flex items-center text-gray-400 group-hover:text-blue-500 mb-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Birth Date</span>
                        </div>
                        <p class="text-gray-800 font-medium text-lg">
                            {{ Auth::user()->profile && Auth::user()->profile->birth_date ? \Carbon\Carbon::parse(Auth::user()->profile->birth_date)->format('d M Y') : '-' }}
                        </p>
                    </div>

               
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 hover:border-blue-200 transition group">
                        <div class="flex items-center text-gray-400 group-hover:text-blue-500 mb-2">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Member Since</span>
                        </div>
                        <p class="text-gray-800 font-medium text-lg">{{ Auth::user()->created_at->format('d M Y') }}</p>
                    </div>
                </div>

            
                <div class="mt-5 bg-gray-50 rounded-xl p-5 border border-gray-100 hover:border-blue-200 transition group">
                    <div class="flex items-center text-gray-400 group-hover:text-blue-500 mb-2">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Address</span>
                    </div>
                    <p class="text-gray-800 font-medium">{{ Auth::user()->profile->address ?? '-' }}</p>
                </div>

               
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('profile.edit') }}" 
                       class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition shadow-md hover:shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                        Edit Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" 
                                class="inline-flex items-center px-6 py-3 bg-red-500 text-white rounded-xl hover:bg-red-600 transition shadow-md hover:shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>