<x-admin-layout>
    <main class="py-4">
        <div class="container px-4 mx-auto">

        <div x-data="{chart: 'bar'}">
            <select x-model="chart" class="form-select">
                <option value="bar">Bar Chart</option>
                <option value="line">Line Chart</option>
                <option value="pie">Pie Chart</option>
                <option value="doughnut">Doughnut Chart</option>
                <option value="radar">Radar Chart</option>
                <option value="polarArea">Polar Area Chart</option>
            </select>

            <div x-show="chart === 'bar'">
                <h1 class="mb-4 text-xl font-bold">Bar Chart Example</h1>
                <canvas class="aspect-square max-h-[40vh]" id="myChart" width="300" height="300"></canvas>
            </div>

            <div x-show="chart === 'line'">
                <h1 class="mb-4 text-xl font-bold">Line Chart Example</h1>
                <canvas class="aspect-square max-h-[40vh]" id="myLineChart" width="400" height="400"></canvas>
            </div>

            <div x-show="chart === 'pie'">
                <h1 class="mb-4 text-xl font-bold">Pie Chart Example</h1>
                <canvas class="aspect-square max-h-[40vh]" id="myPieChart" width="400" height="400"></canvas>
            </div>

            <div x-show="chart === 'doughnut'">
                <h1 class="mb-4 text-xl font-bold">Doughnut Chart Example</h1>
                <canvas class="aspect-square max-h-[40vh]" id="myDoughnutChart" width="400" height="400"></canvas>
            </div>

            <div x-show="chart === 'radar'">
                <h1 class="mb-4 text-xl font-bold">Radar Chart Example</h1>
                <canvas class="aspect-square max-h-[40vh]" id="myRadarChart" width="400" height="400"></canvas>
            </div>

            <div x-show="chart === 'polarArea'">
                <h1 class="mb-4 text-xl font-bold">Polar Area Chart Example</h1>
                <canvas class="aspect-square max-h-[40vh]" id="myPolarAreaChart" width="400" height="400"></canvas>
            </div>

        </div>
    </main>

</x-admin-layout>
