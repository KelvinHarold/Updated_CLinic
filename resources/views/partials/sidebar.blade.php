<aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
    <ul class="space-y-1">
        {{-- Dashboard --}}
        <li>
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 4h6m-6 4h6m-6 0v2a2 2 0 002 2h6a2 2 0 002-2v-2m-6 0H7m0 0H5a2 2 0 01-2-2v-2a2 2 0 012-2h2m0 0v2a2 2 0 002 2h6m0 0H7" />
                </svg>
                Dashboard
            </a>
        </li>

        {{-- Users --}}
        @can('manage_users')
        <li>
            <a href="{{ route('users.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('users.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A5.002 5.002 0 0110 15h4a5.002 5.002 0 014.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Users
            </a>
        </li>
        @endcan

        {{-- Roles --}}
        @can('manage_roles')
        <li>
            <a href="{{ route('roles.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('roles.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
                </svg>
                Roles
            </a>
        </li>
        @endcan

        {{-- Permissions --}}
        @can('manage_permissions')
        <li>
            <a href="{{ route('permissions.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('permissions.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m2 0a2 2 0 100-4H7a2 2 0 100 4h6z" />
                </svg>
                Permissions
            </a>
        </li>
        @endcan

        {{-- Mamas --}}
        @can('manage_mamas')
        <li>
            <a href="{{ route('mamas.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('mamas.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A5.002 5.002 0 0110 15h4a5.002 5.002 0 014.879 2.804M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                Mamas
            </a>
        </li>
        @endcan

        {{-- Children --}}
        @can('manage_children')
        <li>
            <a href="{{ route('children.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('children.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 010 6.844L12 14z" />
                </svg>
                Manage Children
            </a>
        </li>
        @endcan

        {{-- Appointments --}}
        @can('manage_appointments')
        <li>
            <a href="{{ route('appointments.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('appointments.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 19h14M5 15h14" />
                </svg>
                Appointments
            </a>
        </li>
        @endcan

        {{-- Vaccinations --}}
        @can('manage_vaccinations')
        <li>
            <a href="{{ route('vaccinations.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('vaccinations.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v7" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21l-6-3.5" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21l6-3.5" />
                </svg>
                Vaccinations
            </a>
        </li>
        @endcan

        {{-- Growth Monitorings --}}
        @can('manage_growth_monitorings')
        <li>
            <a href="{{ route('growth-monitorings.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('growth-monitorings.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 11V3m4 8V3m-8 8v4m0 0h12" />
                </svg>
                Growth Monitorings
            </a>
        </li>
        @endcan

        {{-- Announcements --}}
        @can('manage_announcements')
        <li>
            <a href="{{ route('announcements.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('announcements.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405M19 13V5a2 2 0 00-2-2h-5.586a1 1 0 00-.707.293l-6 6A1 1 0 005 9v4a2 2 0 002 2h2m6 0v2a2 2 0 01-2 2H7a2 2 0 01-2-2v-2m8 0H7" />
                </svg>
                Announcements
            </a>
        </li>
        @endcan

        {{-- Reminders --}}
        @can('manage_reminders')
        <li>
            <a href="{{ route('reminders.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('reminders.*') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3M5 11h14M5 19h14M5 15h14" />
                </svg>
                Reminders
            </a>
        </li>
        @endcan

        {{-- Chat with Mamas --}}
        @can('chat_with_mamas')
        <li>
            <a href="{{ route('chats.list') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('chats.list') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6M7 16h10" />
                </svg>
                Chat with Mamas
            </a>
        </li>
        @endcan

        {{-- Chat with Doctors --}}
        @can('chat_with_doctors')
        <li>
            <a href="{{ route('chats.list') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('chats.list') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6M7 16h10" />
                </svg>
                Chat with Doctors
            </a>
        </li>
        @endcan

        {{-- Book Appointment --}}
        @can('book_appointments')
        <li>
            <a href="{{ route('appointments.index') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('appointments.index') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3" />
                </svg>
                Book Appointment
            </a>
        </li>
        @endcan

        {{-- Health Records --}}
        @can('view_health_records')
        <li>
            <a href="{{ route('mamas.profile') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('mamas.profile') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Health Records
            </a>
        </li>
        @endcan

        {{-- Visitors Reports --}}
        @can('view_visitors_report')
        <li>
            <a href="{{ route('visitor.dashboard') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('visitor.dashboard') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18" />
                </svg>
                Visitors Reports
            </a>
        </li>
        @endcan

        {{-- NGO Reports --}}
        @can('view_ngos_report')
        <li>
            <a href="{{ route('ngo.reports') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('ngo.reports') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18" />
                </svg>
                Ngo's Reports
            </a>
        </li>
        @endcan

        {{-- Child Vaccine Records --}}
        @can('mother_child_record')
        <li>
            <a href="{{ route('mama.vaccinations') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('mama.vaccinations') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4" />
                </svg>
                Childs Vaccine Records
            </a>
        </li>
        @endcan

        {{-- Child Records --}}
        @can('view_own_children')
        <li>
            <a href="{{ route('children.my') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('children.my') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Child Records
            </a>
        </li>
        @endcan

        {{-- Health Tips --}}
        @can('view_mama_announcements')
        <li>
            <a href="{{ route('mama.announcements') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('mama.announcements') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h6M7 16h10" />
                </svg>
                Health Tips
            </a>
        </li>
        @endcan

        {{-- Relatives Info --}}
        @can('view_relative_clinic_info')
        <li>
            <a href="{{ route('visitor.relatives') }}" 
               class="flex items-center gap-2 py-2 px-3 rounded hover:bg-gray-700 {{ request()->routeIs('visitor.relatives') ? 'bg-gray-700' : '' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Relatives Info
            </a>
        </li>
        @endcan

    </ul>
</aside>
