<nav class="bg-blue-600 text-white p-4 flex justify-between items-center">
    <a href="{{ route('dashboard') }}" class="font-bold text-xl">Clinic System</a>
    <div class="flex items-center">
        @auth
            <span class="mr-4">Hello, {{ auth()->user()->name }}</span>
            <a href="{{ route('logout') }}" 
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
               class="bg-red-500 px-3 py-1 rounded">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        @endauth
    </div>
</nav>
