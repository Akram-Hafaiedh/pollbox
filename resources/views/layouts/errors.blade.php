<!DOCTYPE html>
<html>
<head>
    <title>{{ $title ?? 'Error' }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Add your styles, meta tags, etc. here -->
</head>
<body>
    <div class="flex items-center justify-center w-full h-screen">
        <div>
            <h1>{{ $errorTitle ?? 'Error' }}</h1>
            <p>{{ $errorMessage ?? 'An error occurred.' }}</p>
            @if($debug)
                <p>Debug Information:</p>
                <pre>{{ $errorDebug }}</pre>
            @endif
        </div>
    </div>
</body>
</html>
