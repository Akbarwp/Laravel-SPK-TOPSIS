@extends('dashboard.layouts.app')

@section('container')
    <!-- row 1 -->
    <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-semibold leading-normal text-sm">Kriteria</p>
                                <h5 class="mb-0 font-bold">
                                    {{ $jml_kriteria }}
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="flex justify-center items-center w-12 h-12 rounded-lg bg-gradient-to-tl from-backgroundSecondary to-greenSecondary">
                                <i class="ri-table-fill text-2xl text-greenPrimary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card2 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-semibold leading-normal text-sm">Sub Kriteria</p>
                                <h5 class="mb-0 font-bold">
                                    {{ $subKriteria }}
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="flex justify-center items-center w-12 h-12 rounded-lg bg-gradient-to-tl from-backgroundSecondary to-greenSecondary">
                                <i class="ri-collage-fill text-2xl text-greenPrimary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card3 -->
        <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-semibold leading-normal text-sm">Objek</p>
                                <h5 class="mb-0 font-bold">
                                    {{ $objek }}
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="flex justify-center items-center w-12 h-12 rounded-lg bg-gradient-to-tl from-backgroundSecondary to-greenSecondary">
                                <i class="ri-brackets-fill text-2xl text-greenPrimary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- card4 -->
        <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-row -mx-3">
                        <div class="flex-none w-2/3 max-w-full px-3">
                            <div>
                                <p class="mb-0 font-semibold leading-normal text-sm">Alternatif</p>
                                <h5 class="mb-0 font-bold">
                                    {{ $alternatif }}
                                </h5>
                            </div>
                        </div>
                        <div class="px-3 text-right basis-1/3">
                            <div class="flex justify-center items-center w-12 h-12 rounded-lg bg-gradient-to-tl from-backgroundSecondary to-greenSecondary">
                                <i class="ri-braces-fill text-2xl text-greenPrimary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full px-3 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="flex flex-wrap -mx-3">
                        <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                            <div class="flex flex-col h-full">
                                <p class="pt-2 mb-1 font-semibold">Sistem Pendukung Keputusan</p>
                                <h5 class="font-bold">TOPSIS</h5>
                                <p class="mb-12 text-justify">Topsis adalah metode pengambilan keputusan multi kriteria dengan dasar alternatif yang dipilih memiliki jarak terdekat dengan solusi ideal positif dan memiliki jarak terjauh dari solusi ideal negatif.</p>
                                <a class="mt-auto mb-0 font-semibold leading-normal text-sm group text-slate-500" href="{{ route('hitung_topsis') }}">
                                    Mulai
                                    <i class="ri-arrow-right-line ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                                </a>
                            </div>
                        </div>
                        <div class="max-w-full px-3 mt-12 ml-auto text-center lg:mt-0 lg:w-5/12 lg:flex-none">
                            <div class="h-full bg-gradient-to-tl from-backgroundSecondary to-greenSecondary rounded-xl">
                                <img src="{{ asset('img/shapes/waves-white.svg') }}" class="absolute top-0 hidden w-1/2 h-full lg:block" alt="waves" />
                                <div class="relative flex items-center justify-center h-full">
                                    <img class="relative z-20 w-full pt-6" src="{{ asset('img/illustrations/rocket-white.png') }}" alt="rocket" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
            <div
                class="border-black/12.5 shadow-soft-xl relative flex h-full min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border p-4">
                <div class="relative h-full overflow-hidden bg-cover rounded-xl" style="background-image: url('{{ asset('img/alena-aenami-rooflinesgirl.jpg') }}')">
                    <span class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-to-tl from-gray-900 to-slate-800 opacity-80"></span>
                    <div class="relative z-10 flex flex-col flex-auto h-full p-4">
                        <h5 class="pt-2 mb-6 font-bold text-white">Kegunaan TOPSIS</h5>
                        <ul class="ml-3 text-white" style="list-style-type: square;">
                            <li>Konsepnya yang sederhana dan mudahdipahami.</li>
                            <li>Komputasinya efisien.</li>
                            <li>Memiliki kemampuan yang jarang dimiliki metode lain contohnya mengukur kinerja relatif dari alternatif-alternatif keputusan dalam bentuk yang sederhana. Dapat digunakan metode pengambil keputusan yang lebih cepat.</li>
                        </ul>
                        <a class="mt-auto mb-0 font-semibold leading-normal text-white group text-sm" href="{{ route('hitung_topsis') }}">
                            Mulai
                            <i class="ri-arrow-right-line ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- cards row 3 -->
    <div class="flex flex-wrap mt-6 -mx-3">
        <div class="w-full max-w-full px-3 mt-0 mb-6 lg:mb-0 lg:w-5/12 lg:flex-none">
            <div
                class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="py-4 pr-1 mb-4 bg-gradient-to-tl from-gray-900 to-slate-800 rounded-xl">
                        <div>
                            <canvas id="chart-bars" height="170"></canvas>
                        </div>
                    </div>
                    <h6 class="mt-6 mb-0 ml-2">Kriteria</h6>
                    <p class="ml-2 leading-normal text-sm flex flex-col">
                        <span class="font-semibold">
                            X <i class="ri-arrow-right-line"></i> Kriteria,
                            Y <i class="ri-arrow-right-line"></i> Bobot
                        </span>
                    </p>
                    {{-- <p class="ml-2 leading-normal text-sm">(<span class="font-bold">+23%</span>) than last week</p> --}}
                    <div class="w-full px-6 mx-auto max-w-screen-2xl rounded-xl">
                        <div class="flex flex-wrap mt-0 -mx-3">
                            @foreach ($kriteria as $item)
                                <div class="flex-none w-1/4 max-w-full py-4 pl-0 pr-3 mt-0">
                                    <div class="flex mb-2">
                                        <div class="flex items-center justify-center w-5 h-5 mr-2 text-center bg-center rounded fill-current shadow-soft-2xl bg-gradient-to-tl from-purple-700 to-pink-500 text-neutral-900">
                                            <i class="ri-table-fill text-white text-sm"></i>
                                        </div>
                                        <p class="mt-1 mb-0 leading-tight text-xs">Kriteria {{ $item->id }}: <span class="font-semibold">{{ $item->nama }}</span></p>
                                    </div>
                                    <h4 class="font-bold">{{ $item->bobot }}</h4>
                                    <div class="text-xs h-0.75 flex w-3/4 overflow-visible rounded-lg bg-gray-200">
                                        <progress class="progress progress-secondary w-56" value="{{ $item->bobot }}" max="1"></progress>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid bg-white p-6 pb-0">
                    <h6>Hasil Perhitungan TOPSIS</h6>
                    <p class="leading-normal text-sm flex flex-col">
                        <span class="font-semibold">
                            X <i class="ri-arrow-right-line"></i> Alternatif
                        </span>
                        <span class="font-semibold">
                            Y <i class="ri-arrow-right-line"></i> Nilai
                        </span>
                    </p>
                </div>
                <div class="flex-auto p-4">
                    <div>
                        <canvas id="chart-line" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        var ctx = document.getElementById("chart-bars").getContext("2d");

        new Chart(ctx, {
        type: "bar",
        data: {
            labels: [{{ $kriteriaID }}],
            datasets: [
            {
                label: "Bobot",
                tension: 0.4,
                borderWidth: 0,
                borderRadius: 4,
                borderSkipped: false,
                backgroundColor: "#fff",
                data: [{{ $kriteriaBobot }}],
                maxBarThickness: 6,
            },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            },
            },
            interaction: {
            intersect: false,
            mode: "index",
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                },
                ticks: {
                suggestedMin: 0,
                suggestedMax: 600,
                beginAtZero: true,
                padding: 15,
                font: {
                    size: 14,
                    family: "Open Sans",
                    style: "normal",
                    lineHeight: 2,
                },
                color: "#fff",
                },
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                },
                ticks: {
                display: false,
                },
            },
            },
        },
        });

        // end chart 1

    </script>

    <script>
        var ctx2 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, "rgba(164, 208,164, 1)");
        gradientStroke1.addColorStop(0.2, "rgba(164, 208,164, 0.1)");
        gradientStroke1.addColorStop(0, "rgba(164, 208,164, 0)"); //purple colors

        var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

        gradientStroke2.addColorStop(1, "rgba(20,23,39,0.2)");
        gradientStroke2.addColorStop(0.2, "rgba(72,72,176,0.0)");
        gradientStroke2.addColorStop(0, "rgba(20,23,39,0)"); //purple colors

        new Chart(ctx2, {
        type: "line",
        data: {
            labels: [{{ $hasilAlternatif }}],
            datasets: [
            {
                label: "Nilai",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#617A55",
                borderWidth: 3,
                backgroundColor: gradientStroke1,
                fill: true,
                data: [{{ $hasilNilai }}],
                maxBarThickness: 6,
            },
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false,
            },
            },
            interaction: {
            intersect: false,
            mode: "index",
            },
            scales: {
            y: {
                grid: {
                drawBorder: false,
                display: true,
                drawOnChartArea: true,
                drawTicks: false,
                borderDash: [5, 5],
                },
                ticks: {
                display: true,
                padding: 10,
                color: "#b2b9bf",
                font: {
                    size: 11,
                    family: "Open Sans",
                    style: "normal",
                    lineHeight: 2,
                },
                },
            },
            x: {
                grid: {
                drawBorder: false,
                display: false,
                drawOnChartArea: false,
                drawTicks: false,
                borderDash: [5, 5],
                },
                ticks: {
                display: true,
                color: "#b2b9bf",
                padding: 20,
                font: {
                    size: 11,
                    family: "Open Sans",
                    style: "normal",
                    lineHeight: 2,
                },
                },
            },
            },
        },
        });

        // end chart 2

    </script>
@endsection