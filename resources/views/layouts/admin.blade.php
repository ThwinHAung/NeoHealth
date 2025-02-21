<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <div class="flex h-screen">

        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="h-16 flex items-center justify-center bg-gray-900">
                <h1 class="text-2xl font-semibold">Admin Panel</h1>
            </div>
            <ul class="space-y-2 mt-4 px-4">
                <li><a href="#" class="block py-2 text-lg text-gray-300 hover:bg-gray-700 rounded">Dashboard</a></li>
                <li><a href="#" class="block py-2 text-lg text-gray-300 hover:bg-gray-700 rounded">Users</a></li>
                <li><a href="#" class="block py-2 text-lg text-gray-300 hover:bg-gray-700 rounded">Settings</a></li>
                <li><a href="#" class="block py-2 text-lg text-gray-300 hover:bg-gray-700 rounded">Logout</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <!-- Navbar -->
            <div class="flex items-center justify-between mb-6">
                <div class="text-xl font-semibold text-gray-800 dark:text-white">Dashboard</div>
                <div class="space-x-4">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Profile</button>
                    <button class="bg-red-500 text-white px-4 py-2 rounded">Logout</button>
                </div>
            </div>

            <!-- Content -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
