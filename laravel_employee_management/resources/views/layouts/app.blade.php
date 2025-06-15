<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Laravel Employee Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <header class="bg-blue-600 text-white p-4">
        <h1 class="text-xl font-bold">Employee Management System</h1>
    </header>
    <main class="flex-grow container mx-auto p-4">
        @yield('content')
    </main>
    <footer class="bg-gray-200 text-center p-4">
        &copy; {{ date('Y') }} Employee Management
    </footer>
</body>
</html>
