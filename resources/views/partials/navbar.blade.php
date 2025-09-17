<!-- Alpine.js CDN -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<!-- Boxicons -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

<nav class="bg-white border-b border-gray-200 shadow-sm" x-data="{ openProfile: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">

           <!-- Logo & Clinic Name -->
<div class="flex items-center space-x-3">
    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
        <img src="{{ asset('images/Logo.jpg') }}" alt="Mtoto Clinic Logo" class="h-14 w-14 object-contain"> 
        <span class="text-2xl font-bold text-green-600 truncate">Mtoto Clinic</span>
    </a>
</div>


            <!-- Welcome & Status -->
            <div class="flex items-center space-x-4 md:space-x-6">
                <p class="text-gray-700 font-medium text-sm sm:text-lg truncate">Welcome: {{ Auth::user()->name }}</p>

                @php $user = Auth::user(); @endphp
                @if ($user && $user->getRoleNames()->first() === 'doctor')
                <div class="flex items-center space-x-1 sm:space-x-2 text-sm sm:text-lg">
                    <label class="font-semibold text-gray-700">Status:</label>
                    <span class="{{ $user->is_active ? 'text-green-600' : 'text-red-600' }} font-medium">
                        {{ $user->is_active ? 'Online' : 'Offline' }}
                    </span>
                </div>
                @endif
            </div>

            <!-- Profile Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center px-3 py-2 rounded-md hover:bg-gray-100 focus:outline-none space-x-2">
                    <!-- Profile Picture -->
                    <img src="{{ $user->profile_picture ? asset($user->profile_picture) : asset('images/default-avatar.png') }}" 
                         alt="Profile Picture" 
                         class="h-8 w-8 rounded-full object-cover border border-gray-300">
                    <!-- Dropdown Arrow -->
                    <svg class="h-4 w-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0L5.293 8.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div x-show="open" @click.away="open = false"
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-150"
                     x-transition:leave-start="opacity-100 scale-100"
                     x-transition:leave-end="opacity-0 scale-95"
                     class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md py-1 z-50">
                    <a href="{{ route('profile.edit') }}" class="flex items-center px-4 py-2 text-gray-700 hover:bg-gray-100 space-x-2">
                        <i class='bx bx-user'></i>
                        <span>Profile</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="flex items-center w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100 space-x-2">
                            <i class='bx bx-log-out'></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>
