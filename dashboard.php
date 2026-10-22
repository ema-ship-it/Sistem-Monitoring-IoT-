<?php
// Mock Data (Nantinya data ini bisa diambil dari Database MySQL / API IoT)
$total_energi = 14.5; // kWh
$status_efisiensi = "Sangat Baik (92%)";
$biaya_listrik = 21750; // IDR
$perangkat_aktif = "18/24";

// Data Sensor Real-time
$suhu = 23.4; // Celsius
$kelembapan = 55; // %
$co2 = 650; // ppm

// Format Rupiah
function formatRupiah($angka) {
    return 'Rp ' . number_format($angka, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard IoT Efisiensi Energi</title>
    <!-- Tailwind CSS CDN untuk styling modern -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome CDN untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Chart.js CDN untuk Grafik -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>
<body class="flex h-screen overflow-hidden">

    <!-- Sidebar Menu -->
    <aside class="w-64 bg-slate-900 border-r border-slate-800 flex flex-col">
        <div class="p-6 text-xl font-bold text-emerald-400 flex items-center gap-3">
            <i class="fa-solid fa-bolt text-emerald-400"></i> SmartEnergy
        </div>
        <nav class="flex-1 px-4 space-y-2">
            <a href="#" class="flex items-center gap-3 px-4 py-3 bg-emerald-600/20 text-emerald-400 rounded-xl font-medium"><i class="fa-solid fa-chart-pie"></i> Dashboard</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition"><i class="fa-solid fa-file-lines"></i> Laporan</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition"><i class="fa-solid fa-sliders"></i> Kontrol Perangkat</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition"><i class="fa-solid fa-microchip"></i> Node Sensor</a>
            <a href="#" class="flex items-center gap-3 px-4 py-3 text-slate-400 hover:bg-slate-800 hover:text-white rounded-xl transition"><i class="fa-solid fa-gear"></i> Pengaturan</a>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 overflow-y-auto p-8">
        
        <!-- Header -->
        <header class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold">Dashboard Monitoring & Pengendalian IoT</h1>
                <p class="text-slate-400 text-sm">Sistem Efisiensi Energi Ruangan Real-time</p>
            </div>
            <div class="flex items-center gap-4">
                <span class="bg-emerald-500/10 text-emerald-400 text-xs px-3 py-1.5 rounded-full border border-emerald-500/20 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span> Sistem IoT Online
                </span>
            </div>
        </header>

        <!-- Metric Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Card 1 -->
            <div class="bg-slate-900 border border-slate-800 p-5 rounded-2xl flex items-center gap-4">
                <div class="w-12 h-12 bg-amber-500/10 text-amber-500 rounded-xl flex items-center justify-center text-xl">
                    <i class="fa-solid fa-plug"></i>
                </div>
                <div>
                    <p class="text-slate-400 text-xs font-medium">Total Energi Hari Ini</p>
                    <h3 class="text-xl font-bold mt-1"><?php echo $total_energi; ?> <span class="text-sm font-normal text-slate-400">kWh</span></h3>
                    <p class="text-xs text-emerald-400 mt-1"><i class="fa-solid fa-arrow-down"></i> -12% vs Target</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-slate-900 border border-slate-800 p-5 rounded-2xl flex items-center gap-4">
                <div class="w-12 h-12 bg-emerald-500/10 text-emerald-500 rounded-xl flex items-center justify-center text-xl">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <div>
                    <p class="text-slate-400 text-xs font-medium">Status Efisiensi</p>
                    <h3 class="text-xl font-bold mt-1 text-emerald-400"><?php echo $status_efisiensi; ?></h3>
                    <p class="text-xs text-slate-400 mt-1">Sangat Optimal</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-slate-900 border border-slate-800 p-5 rounded-2xl flex items-center gap-4">
                <div class="w-12 h-12 bg-blue-500/10 text-blue-500 rounded-xl flex items-center justify-center text-xl">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <div>
                    <p class="text-slate-400 text-xs font-medium">Perkiraan Biaya</p>
                    <h3 class="text-xl font-bold mt-1"><?php echo formatRupiah($biaya_listrik); ?></h3>
                    <p class="text-xs text-slate-400 mt-1">Tarif Listrik Aktual</p>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="bg-slate-900 border border-slate-800 p-5 rounded-2xl flex items-center gap-4">
                <div class="w-12 h-12 bg-purple-500/10 text-purple-500 rounded-xl flex items-center justify-center text-xl">
                    <i class="fa-solid fa-network-wired"></i>
                </div>
                <div>
                    <p class="text-slate-400 text-xs font-medium">Perangkat Aktif</p>
                    <h3 class="text-xl font-bold mt-1"><?php echo $perangkat_aktif; ?></h3>
                    <p class="text-xs text-slate-400 mt-1">Node Terhubung</p>
                </div>
            </div>
        </div>

        <!-- Section: Kondisi Lingkungan & Grafik Konsumsi -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            
            <!-- Widget Kondisi Lingkungan Real-Time -->
            <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl">
                <h2 class="text-lg font-bold mb-4 flex items-center justify-between">
                    <span>Kondisi Lingkungan</span>
                    <span class="text-xs text-slate-500">Real-time</span>
                </h2>
                
                <div class="space-y-4">
                    <!-- Temperatur -->
                    <div class="flex justify-between items-center bg-slate-800/50 p-4 rounded-xl border border-slate-800">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-temperature-half text-amber-400 text-xl"></i>
                            <div>
                                <p class="text-xs text-slate-400">Temperatur</p>
                                <p class="text-sm font-semibold">Suhu Ruangan</p>
                            </div>
                        </div>
                        <span class="text-2xl font-bold text-amber-400"><?php echo $suhu; ?>°C</span>
                    </div>

                    <!-- Kelembapan -->
                    <div class="flex justify-between items-center bg-slate-800/50 p-4 rounded-xl border border-slate-800">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-droplet text-blue-400 text-xl"></i>
                            <div>
                                <p class="text-xs text-slate-400">Kelembapan</p>
                                <p class="text-sm font-semibold">Kelembapan Udara</p>
                            </div>
                        </div>
                        <span class="text-2xl font-bold text-blue-400"><?php echo $kelembapan; ?>%</span>
                    </div>

                    <!-- CO2 / Kualitas Udara -->
                    <div class="flex justify-between items-center bg-slate-800/50 p-4 rounded-xl border border-slate-800">
                        <div class="flex items-center gap-3">
                            <i class="fa-solid fa-wind text-emerald-400 text-xl"></i>
                            <div>
                                <p class="text-xs text-slate-400">Kualitas Udara</p>
                                <p class="text-sm font-semibold">Kadar CO2</p>
                            </div>
                        </div>
                        <span class="text-2xl font-bold text-emerald-400"><?php echo $co2; ?> <span class="text-xs font-normal text-slate-400">ppm</span></span>
                    </div>
                </div>
            </div>

            <!-- Grafik Konsumsi Energi (Chart.js) -->
            <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl lg:col-span-2">
                <h2 class="text-lg font-bold mb-4">Konsumsi Energi vs Target (kWh)</h2>
                <div class="h-64">
                    <canvas id="energyChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Section: Kontrol & Otomatisasi Perangkat -->
        <div class="bg-slate-900 border border-slate-800 p-6 rounded-2xl">
            <h2 class="text-lg font-bold mb-4">Pengendalian Otomatis & Sakelar Perangkat</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Kontrol AC -->
                <div class="bg-slate-800/40 border border-slate-800 p-4 rounded-xl flex justify-between items-center">
                    <div>
                        <h4 class="font-semibold flex items-center gap-2"><i class="fa-solid fa-snowflake text-cyan-400"></i> AC Utama</h4>
                        <p class="text-xs text-slate-400 mt-1">Set: 24°C | Mode Hemat</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                    </label>
                </div>

                <!-- Kontrol Pencahayaan Smart -->
                <div class="bg-slate-800/40 border border-slate-800 p-4 rounded-xl flex justify-between items-center">
                    <div>
                        <h4 class="font-semibold flex items-center gap-2"><i class="fa-solid fa-lightbulb text-amber-400"></i> Lampu Otomatis</h4>
                        <p class="text-xs text-slate-400 mt-1">Sensitivitas Cahaya: 70%</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                    </label>
                </div>

                <!-- Sensor Kehadiran Orang -->
                <div class="bg-slate-800/40 border border-slate-800 p-4 rounded-xl flex justify-between items-center">
                    <div>
                        <h4 class="font-semibold flex items-center gap-2"><i class="fa-solid fa-user-check text-purple-400"></i> Deteksi Hunian</h4>
                        <p class="text-xs text-slate-400 mt-1">Mati Otomatis Jika Kosong</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" class="sr-only peer" checked>
                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                    </label>
                </div>

            </div>
        </div>

    </main>

    <!-- Script Chart.js -->
    <script>
        const ctx = document.getElementById('energyChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['08:00', '10:00', '12:00', '14:00', '16:00', '18:00', '20:00'],
                datasets: [
                    {
                        label: 'Penggunaan Aktual (kWh)',
                        data: [1.2, 1.8, 2.5, 2.1, 1.9, 1.4, 0.9],
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        fill: true,
                        tension: 0.4
                    },
                    {
                        label: 'Target Efisiensi (kWh)',
                        data: [1.5, 2.0, 2.8, 2.5, 2.2, 1.8, 1.2],
                        borderColor: '#64748b',
                        borderDash: [5, 5],
                        fill: false,
                        tension: 0.4
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        labels: { color: '#94a3b8' }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#94a3b8' },
                        grid: { color: '#1e293b' }
                    },
                    y: {
                        ticks: { color: '#94a3b8' },
                        grid: { color: '#1e293b' }
                    }
                }
            }
        });
    </script>
</body>
</html>