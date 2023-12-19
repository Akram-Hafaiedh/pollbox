<!-- resources/views/emails/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ config('app.name') }}</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.6/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="max-w-2xl mx-auto mt-8 bg-white p-8 rounded-lg shadow-md">

        <h1 class="text-3xl font-semibold text-indigo-600 mb-4">Welcome to {{ config('app.name') }}!</h1>

        <p class="text-lg mb-4">Dear {{ $user->name }},</p>

        <p class="text-lg mb-4">Thank you for joining {{ config('app.name') }}. We're thrilled to have you on board!</p>

        <div class="mb-4">
            <p class="text-sm font-semibold text-gray-700">Your account details:</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Password:</strong> {{ $password }}</p>
        </div>

        <p class="text-lg mb-4">Feel free to explore our platform and let us know if you have any questions or feedback.
        </p>

        <p class="text-sm text-gray-600">Best regards,<br>{{ config('app.name') }} Team</p>

    </div>

</body>

</html>
