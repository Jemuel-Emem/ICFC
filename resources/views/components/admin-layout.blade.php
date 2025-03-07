<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ICFC</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet" />

    <!-- TUI Calendar CSS -->
<link rel="stylesheet" href="https://uicdn.toast.com/calendar/latest/toastui-calendar.min.css">

    <style>
        [x-cloak] {
            display: none;
        }

        #logo {
            font-family: "Anton", sans-serif;
            font-weight: 600;
            font-size: 30px;
            font-style: normal;
        }

        /* Custom Colors */
        body {
            background-color: #f5f7fa;
        }

        aside {
            background-color: #d97706; /* Amber color for sidebar */
        }

        aside ul li a {
            color: #ffffff;
            transition: color 0.3s, background-color 0.3s;
        }

        aside ul li a:hover {
            color: #d97706;
            background-color: #fde68a; /* Lighter amber hover */
        }

        .header {
            background-color: #d97706; /* Amber color for header */
            color: white;
        }

        .dropdown {
            background-color: white;
            color: black;
        }

        main {
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @wireUiScripts
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-notifications position="top-right" />

    <!-- Sidebar -->
    <aside id="sidebar-multi-level-sidebar"
        class="border fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0">
        <div class="h-full px-3 py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <a href="{{ route('Admindashboard') }}">
                    <div class="flex flex-col items-center h-full px-3 overflow-y-auto  rounded-lg">
                        <div>
                            <img src="{{ asset('images/alogo.png') }}" alt="Logo" class="w-32 h-16 rounded-lg">
                        </div>
                        <div class="text-center mt-2">
                            <label for="" class="font-black text-white text-xl" id="logo">ICFC</label>
                        </div>
                    </div>
                </a>

                <li>
                    <a href="{{ route('Admindashboard') }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="ri-dashboard-3-fill"></i>
                        <span class="ml-3">Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.weddings') }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="ri-group-2-fill"></i>
                        <span class="ml-3">Weddings</span>
                    </a>
                </li>

                <li>
                <a href="{{ route('admin.baptism') }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="ri-group-2-fill"></i>
                        <span class="ml-3">Baptisms</span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.funeral') }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="ri-building-3-fill"></i>
                        <span class="ml-3">Funerals</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.donations') }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="ri-hand-heart-fill"></i>
                        <span class="ml-3">Donations</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.certificate') }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="ri-folder-6-fill"></i>
                        <span class="ml-3">Certificate</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.updates') }}"
                        class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                        <i class="ri-folder-6-fill"></i>
                        <span class="ml-3">Updates</span>
                    </a>
                </li>



            </ul>
        </div>
    </aside>


    <div class="header flex justify-between items-center p-4 sm:ml-64">
        <div class="ml-10">
            <img src="{{ asset('images/alogo.png') }}" alt="SKSU Logo" class="h-16 w-32">
        </div>
        <div class="text-right">
            <span class="font-bold">{{ Auth::user()->name }}</span>
            <x-dropdown>
                <x-dropdown.item label="Logout" href="{{ route('logout') }}" />
            </x-dropdown>
        </div>
    </div>


    <div class="p-4 sm:ml-64">
        <main class="rounded-lg">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
