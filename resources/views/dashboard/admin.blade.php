@extends('layouts.app')
@section('title','Admin Dashboard')
@section('content')

<h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>


<!-- Stats Cards with colors and icons -->
<div class="grid grid-cols-4 gap-6 mb-8">
    <!-- Doctors Card -->
    <div class="bg-green-100 p-6 rounded shadow flex flex-col items-center">
        <div class="bg-green-200 p-3 rounded-full mb-2">
            <i class='bx bxs-clinic text-green-600 text-2xl'></i>

        </div>
        <h2 class="font-semibold text-gray-700">Doctors</h2>
        <p class="text-2xl font-bold mt-2">{{ \Spatie\Permission\Models\Role::findByName('doctor')->users()->count() }}</p>
    </div>

    <!-- Pregnant Women Card -->
    <div class="bg-blue-100 p-6 rounded shadow flex flex-col items-center">
        <div class="bg-blue-200 p-3 rounded-full mb-2">
            <i class='bx bx-female text-blue-600 text-2xl'></i>
        </div>
        <h2 class="font-semibold text-gray-700">Pregnant Women</h2>
        <p class="text-2xl font-bold mt-2">{{ App\Models\Mama::where('type','pregnant')->count() }}</p>
    </div>

    <!-- Breastfeeding Women Card -->
    <div class="bg-yellow-100 p-6 rounded shadow flex flex-col items-center">
        <div class="bg-yellow-200 p-3 rounded-full mb-2">
            <i class='bx bx-happy-alt text-yellow-600 text-2xl'></i>

        </div>
        <h2 class="font-semibold text-gray-700">Breastfeeding Women</h2>
        <p class="text-2xl font-bold mt-2">{{ App\Models\Mama::where('type','breastfeeding')->count() }}</p>
    </div>

    <!-- Children Card -->
    <div class="bg-red-100 p-6 rounded shadow flex flex-col items-center">
        <div class="bg-red-200 p-3 rounded-full mb-2">
            <i class='bx bx-child text-red-600 text-2xl'></i>
        </div>
        <h2 class="font-semibold text-gray-700">Children</h2>
        <p class="text-2xl font-bold mt-2">{{ App\Models\Child::count() }}</p>
    </div>
</div>


<!-- Bar Chart -->
<div x-data="{
        initChart() {
            const ctx = this.$refs.usersChart.getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Doctors', 'Pregnant Women', 'Breastfeeding Women', 'Children'],
                    datasets: [{
                        label: 'Total Users',
                        data: [
                            {{ \Spatie\Permission\Models\Role::findByName('doctor')->users()->count() }},
                            {{ App\Models\Mama::where('type','pregnant')->count() }},
                            {{ App\Models\Mama::where('type','breastfeeding')->count() }},
                            {{ App\Models\Child::count() }}
                        ],
                        backgroundColor: [
                            'rgba(34,197,94,0.8)',   // Green for Doctors
                            'rgba(59,130,246,0.8)',  // Blue for Pregnant Women
                            'rgba(234,179,8,0.8)',   // Yellow for Breastfeeding Women
                            'rgba(239,68,68,0.8)'    // Red for Children
                        ],
                        borderColor: [
                            'rgba(34,197,94,1)',
                            'rgba(59,130,246,1)',
                            'rgba(234,179,8,1)',
                            'rgba(239,68,68,1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { 
                        y: { beginAtZero: true },
                        x: { grid: { display: false } }
                    }
                }
            });
        }
    }"
    x-init="initChart()"
    class="bg-white p-6 rounded shadow"
>
    <h2 class="font-semibold text-gray-700 mb-4">Users Overview</h2>
    <canvas x-ref="usersChart" class="w-full h-64"></canvas>
</div>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@endsection
