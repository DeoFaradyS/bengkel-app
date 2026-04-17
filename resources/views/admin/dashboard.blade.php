@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="space-y-6">

        {{-- CARD --}}
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <x-ui.card-stat title="Pendapatan" value="Rp 12.500.000" />
            <x-ui.card-stat title="Total Servis" value="86" />
            <x-ui.card-stat title="Transaksi" value="120" />
            <x-ui.card-stat title="Customer Baru" value="24" />
        </div>

        {{-- CHART PENDAPATAN --}}
        <div class="bg-white p-5 rounded-2xl shadow">
            <h3 class="text-lg font-semibold mb-4">Pendapatan</h3>
            <div id="revenue-chart"></div>
        </div>

        {{-- 2 CHART --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- BAR CHART --}}
            <div class="bg-white p-5 rounded-2xl shadow">
                <h3 class="text-lg font-semibold mb-4">Jenis Servis</h3>
                <div id="service-chart"></div>
            </div>

            {{-- PIE CHART --}}
            <div class="bg-white p-5 rounded-2xl shadow">
                <h3 class="text-lg font-semibold mb-4">Sumber Pendapatan</h3>
                <div id="income-chart"></div>
            </div>

        </div>

        {{-- RECENT TRANSAKSI --}}
        <div class="bg-white p-5 rounded-2xl shadow">
            <h3 class="text-lg font-semibold mb-4">Transaksi Terbaru</h3>

            <table class="w-full text-sm">
                <thead class="text-gray-500 border-b">
                    <tr>
                        <th class="text-left py-2">Customer</th>
                        <th class="text-left py-2">Servis</th>
                        <th class="text-left py-2">Total</th>
                        <th class="text-left py-2">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    <tr>
                        <td class="py-2">Budi</td>
                        <td>Servis Dinamo</td>
                        <td>Rp 200.000</td>
                        <td>16 Apr</td>
                    </tr>
                    <tr>
                        <td class="py-2">Andi</td>
                        <td>Ganti Carbon Brush</td>
                        <td>Rp 150.000</td>
                        <td>16 Apr</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function () {

                // LINE CHART (Pendapatan)
                new ApexCharts(document.querySelector("#revenue-chart"), {
                    chart: {
                        type: "line",
                        height: 300,
                        toolbar: { show: false }
                    },
                    series: [{
                        name: "Pendapatan",
                        data: [1200000, 1500000, 1000000, 1800000, 2000000, 1700000]
                    }],
                    xaxis: {
                        categories: ["Sen", "Sel", "Rab", "Kam", "Jum", "Sab"]
                    },
                    stroke: {
                        curve: "smooth"
                    }
                }).render();

                // BAR CHART (Servis)
                new ApexCharts(document.querySelector("#service-chart"), {
                    chart: {
                        type: "bar",
                        height: 300
                    },
                    series: [{
                        name: "Jumlah",
                        data: [40, 25, 21]
                    }],
                    xaxis: {
                        categories: ["Dinamo Starter", "Alternator", "Carbon Brush"]
                    }
                }).render();

                // PIE CHART (Pendapatan)
                new ApexCharts(document.querySelector("#income-chart"), {
                    chart: {
                        type: "pie",
                        height: 300
                    },
                    series: [70, 30],
                    labels: ["Jasa Servis", "Sparepart"]
                }).render();

            });
        </script>
    @endpush
@endsection