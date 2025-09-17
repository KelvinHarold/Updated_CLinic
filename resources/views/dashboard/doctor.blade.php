@extends('layouts.app')
@section('title','Doctor Dashboard')
@section('content')
<h1 class="text-3xl font-bold mb-6">Doctor Dashboard</h1>

<div class="grid grid-cols-4 gap-6 mb-10">
    <!-- Pregnant Women -->
    <div class="bg-pink-100 p-6 rounded-xl shadow flex items-center space-x-4">
        <i class='bx bx-female text-pink-600 text-4xl'></i>
        <div>
            <h2 class="font-semibold text-gray-700">Pregnant Women</h2>
            <p class="text-2xl font-bold text-pink-700">
                {{ App\Models\Mama::where('type','pregnant')->count() }}
            </p>
        </div>
    </div>

    <!-- Breastfeeding Women -->
    <div class="bg-purple-100 p-6 rounded-xl shadow flex items-center space-x-4">
        <i class='bx bx-child text-purple-600 text-4xl'></i>
        <div>
            <h2 class="font-semibold text-gray-700">Breastfeeding Women</h2>
            <p class="text-2xl font-bold text-purple-700">
                {{ App\Models\Mama::where('type','breastfeeding')->count() }}
            </p>
        </div>
    </div>

    <!-- Children -->
    <div class="bg-yellow-100 p-6 rounded-xl shadow flex items-center space-x-4">
        <i class='bx bxs-baby-carriage text-yellow-600 text-4xl'></i>
        <div>
            <h2 class="font-semibold text-gray-700">Children</h2>
            <p class="text-2xl font-bold text-yellow-700">
                {{ App\Models\Child::count() }}
            </p>
        </div>
    </div>

    <!-- Announcements -->
    <div class="bg-blue-100 p-6 rounded-xl shadow flex items-center space-x-4">
        <i class='bx bx-bell text-blue-600 text-4xl'></i>
        <div>
            <h2 class="font-semibold text-gray-700">Announcements</h2>
            <p class="text-2xl font-bold text-blue-700">
                {{ App\Models\Announcement::count() }}
            </p>
        </div>
    </div>
</div>

<!-- Graph Section -->
<div class="bg-white p-6 rounded-xl shadow">
    <h2 class="text-xl font-semibold mb-4 text-gray-700">Top 5 Diseases Affecting Children Under 5</h2>
    <canvas id="diseaseChart" height="100"></canvas>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('diseaseChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Malaria', 'Pneumonia', 'Diarrhea', 'Malnutrition', 'TB'],
            datasets: [{
                label: 'Number of Cases',
                data: [45, 30, 25, 15, 10], // Hapa unaweza kuweka dynamic data kutoka DB
                backgroundColor: [
                    '#f87171', // Malaria (red)
                    '#60a5fa', // Pneumonia (blue)
                    '#fbbf24', // Diarrhea (yellow)
                    '#34d399', // Malnutrition (green)
                    '#a78bfa'  // TB (purple)
                ],
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 5 }
                }
            }
        }
    });
</script>
@endsection
