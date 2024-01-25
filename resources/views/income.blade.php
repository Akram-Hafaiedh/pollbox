<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    {{-- ... --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <main class="py-4">
    <div class="container px-4 mx-auto">
        <h1 class="mb-4 text-xl font-bold">Bar Chart Example</h1>
        <!-- Adjust the width and height of the canvas to make the chart smaller -->
        <canvas class="aspect-square max-h-[40vh]" id="myChart" width="300" height="300"></canvas>
        <h1 class="mb-4 text-xl font-bold">Line Chart Example</h1>
        <canvas class="aspect-square max-h-[40vh]" id="myLineChart" width="400" height="400"></canvas>
        <h1 class="mb-4 text-xl font-bold">Pie Chart Example</h1>
        <canvas id="myPieChart" width="400" height="400"></canvas>
    </div>
</main>
    </div>

    {{-- Include the compiled JavaScript assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>
