<aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
    <ul>
        {{-- Dashboard is common --}}
        <li class="mb-2"><a href="{{ route('dashboard') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Dashboard</a></li>

        @can('manage_users')
            <li class="mb-2"><a href="{{ route('users.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Users</a></li>
        @endcan

        @can('manage_roles')
            <li class="mb-2"><a href="{{ route('roles.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Roles</a></li>
        @endcan

        @can('manage_permissions')
            <li class="mb-2"><a href="{{ route('permissions.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Permissions</a></li>
        @endcan

        @can('manage_mamas')
            <li class="mb-2"><a href="{{ route('mamas.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Mamas</a></li>
        @endcan

        @can('manage_children')
            <li class="mb-2"><a href="{{ route('children.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Manage Children</a></li>
        @endcan

        @can('manage_appointments')
            <li class="mb-2"><a href="{{ route('appointments.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Appointments</a></li>
        @endcan

        @can('manage_vaccinations')
            <li class="mb-2"><a href="{{ route('vaccinations.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Vaccinations</a></li>
        @endcan

        @can('manage_growth_monitorings')
            <li class="mb-2"><a href="{{ route('growth-monitorings.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Growth Monitorings</a></li>
        @endcan

        @can('manage_announcements')
            <li class="mb-2"><a href="{{ route('announcements.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Announcements</a></li>
        @endcan

        @can('manage_reminders')
            <li class="mb-2"><a href="{{ route('reminders.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Reminders</a></li>
        @endcan

        {{-- Additional permissions for other actions --}}
        @can('chat_with_mamas')
            <li class="mb-2"><a href="{{ route('chats.list') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Chat with Mamas</a></li>
        @endcan

        @can('chat_with_doctors')
            <li class="mb-2"><a href="{{ route('chats.list') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Chat with Doctors</a></li>
        @endcan

        @can('book_appointments')
            <li class="mb-2"><a href="{{ route('appointments.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Book Appointment</a></li>
        @endcan

        @can('set_reminders')
            <li class="mb-2"><a href="{{ route('reminders.index') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Set Reminder</a></li>
        @endcan

        @can('view_health_records')
            <li class="mb-2"><a href="{{ route('mamas.profile') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Health Records</a></li>
        @endcan

        @can('view_visitors_report')
            <li class="mb-2"><a href="{{ route('visitor.dashboard') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Visitors Reports</a></li>
        @endcan

        @can('view_ngos_report')
            <li class="mb-2"><a href="{{ route('ngo.reports') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Ngo's Reports</a></li>
        @endcan

         @can('mother_child_record')
            <li class="mb-2"><a href="{{ route('mama.vaccinations') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Childs Vaccine Records</a></li>
        @endcan

          @can('view_own_children')
            <li class="mb-2"><a href="{{ route('children.my') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Child Records</a></li>
        @endcan

          @can('view_mama_announcements')
            <li class="mb-2"><a href="{{ route('mama.announcements') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Health Tips</a></li>
        @endcan


         @can('view_relative_clinic_info')
            <li class="mb-2"><a href="{{ route('visitor.relatives') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">Relatives Info</a></li>
        @endcan

        
         @can('my_reminders')
            <li class="mb-2"><a href="{{ route('reminders.my') }}" class="block py-2 px-3 hover:bg-gray-700 rounded">My Reminders</a></li>
        @endcan
    </ul>
</aside>
