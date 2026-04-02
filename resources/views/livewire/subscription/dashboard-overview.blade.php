<div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <div class="mb-6 grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6">

        <div class="bg-[#121212] rounded-2xl p-5 sm:p-6 shadow-xl border border-gray-800 flex flex-col justify-between hover:border-gray-700 transition">
            <span class="text-gray-400 text-xs sm:text-sm font-semibold uppercase tracking-wider">Monthly Spend</span>
            <span class="text-3xl sm:text-4xl font-extrabold text-white mt-3 sm:mt-4">£{{ number_format($totalMonthly, 2) }}</span>
        </div>

        <div class="bg-[#121212] rounded-2xl p-5 sm:p-6 shadow-xl border border-gray-800 flex flex-col justify-between hover:border-gray-700 transition">
            <span class="text-gray-400 text-xs sm:text-sm font-semibold uppercase tracking-wider">Active Subscriptions</span>
            <span class="text-3xl sm:text-4xl font-extrabold text-white mt-3 sm:mt-4">{{ $activeCount }}</span>
        </div>

        <div class="bg-gradient-to-br from-blue-900/30 to-purple-900/30 rounded-2xl p-5 sm:p-6 shadow-xl border border-indigo-500/20 flex flex-col justify-between text-white hover:border-indigo-500/40 transition">
            <span class="text-blue-300 text-xs sm:text-sm font-semibold uppercase tracking-wider truncate">Next Bill: {{ $nextBillName }}</span>
            <span class="text-2xl sm:text-3xl font-bold mt-3 sm:mt-4">{{ $nextBillDate }}</span>
        </div>

    </div>

    <div class="bg-[#121212] rounded-2xl p-5 sm:p-6 shadow-xl border border-gray-800 overflow-hidden w-full"
         x-data="{
             init() {
                 let options = {
                     series: [{
                         name: 'Cumulative Cost',
                         data: {{ json_encode($chartData) }}
                     }],
                     chart: {
                         type: 'area',
                         height: 320,
                         toolbar: { show: false },
                         fontFamily: 'inherit',
                         background: 'transparent'
                     },
                     theme: { mode: 'dark' },
                     colors: ['#3b82f6'],
                     fill: {
                         type: 'gradient',
                         gradient: {
                             shadeIntensity: 1,
                             opacityFrom: 0.45,
                             opacityTo: 0.05,
                             stops: [50, 100]
                         }
                     },
                     dataLabels: { enabled: false },
                     stroke: { curve: 'smooth', width: 3 },
                     xaxis: {
                         categories: {{ json_encode($chartLabels) }},
                         tooltip: { enabled: false },
                         axisBorder: { show: false },
                         axisTicks: { show: false }
                     },
                     yaxis: {
                         labels: {
                             formatter: function (value) { return '£' + value; }
                         }
                     },
                     grid: {
                         borderColor: '#27272a',
                         strokeDashArray: 4,
                     }
                 };

                 let chart = new ApexCharts(this.$refs.chart, options);
                 chart.render();
             }
         }">

        <div class="mb-4">
            <h3 class="text-base sm:text-lg font-bold text-white">6-Month Spending Forecast</h3>
            <p class="text-xs sm:text-sm text-gray-400 mt-1">How much your subscriptions will cost you over time.</p>
        </div>

        <div x-ref="chart" class="w-full min-h-[320px]"></div>

    </div>
</div>
