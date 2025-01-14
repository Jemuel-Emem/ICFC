<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to ICFC - Independent Church of Filipino Christians</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function showSection(sectionId) {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => section.classList.add('hidden'));
            document.getElementById(sectionId).classList.remove('hidden');
        }
    </script>
</head>
<body class="font-sans bg-gray-100 text-gray-800 flex flex-col min-h-screen">
    <header class="bg-amber-900 text-white py-6">
        <div class="container mx-auto text-center">
            <h1 class="text-4xl font-bold">Independent Church of Filipino Christians (ICFC)</h1>
            <p class="mt-2 text-lg">Faith. Fellowship. Community.</p>
        </div>
        <nav class="mt-4 flex justify-center space-x-4">
            <button onclick="showSection('dashboard')" class="px-4 py-2 bg-white text-amber-900 rounded hover:bg-gray-200">Dashboard</button>
            <button onclick="showSection('services')" class="px-4 py-2 bg-white text-amber-900 rounded hover:bg-gray-200">Services</button>
            <button onclick="showSection('about')" class="px-4 py-2 bg-white text-amber-900 rounded hover:bg-gray-200">About Us</button>
           <a href="{{ route('login') }}"> <button  class="px-4 py-2 bg-white text-amber-900 rounded hover:bg-gray-200">Login</button></a>
        </nav>
    </header>

    <main class="flex-grow">
        <div id="dashboard" class="section">
            <div class="hero bg-cover bg-center flex items-center text-yellow600 text-shadow-md" >
                <div class="text-center px-6 w-1/2">
                    <h2 class="text-5xl font-extrabold mb-4">Welcome to Our Family</h2>
                    <p class="text-lg font-medium max-w-2xl mx-auto">
                        At ICFC, we believe in fostering a community rooted in faith, love, and service. Join us as we journey together in worship and spiritual growth.
                    </p>
                </div>
                <div class="w-1/2 flex justify-center mt-2">
                    <img src="{{ asset('images/churchlogo.jpg') }}" alt="Church Logo" class="max-w-full h-auto">
                </div>
            </div>
        </div>

        <div id="services" class="section hidden">
            <div class="container mx-auto py-10">
                <h2 class="text-3xl font-bold mb-6 text-center">Our Services</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <h3 class="text-xl font-semibold mb-2">Wedding</h3>
                        <p class="text-gray-600">Celebrate your union in a sacred and memorable ceremony.</p>
                       <a href="{{ route('register') }}"> <button class="bg-gray-900 text-white p-1 rounded-sm mt-2 w-64 ">Appoint Now</button></a>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <h3 class="text-xl font-semibold mb-2">Baptism</h3>
                        <p class="text-gray-600">Begin your spiritual journey with the blessing of baptism.</p>
                       <a href="{{ route('register') }}"> <button class="bg-gray-900 text-white p-1 rounded-sm mt-2 w-64 ">Appoint Now</button></a>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <h3 class="text-xl font-semibold mb-2">Funeral</h3>
                        <p class="text-gray-600">Honoring and celebrating the life of your loved ones.</p>
                       <a href="{{ route('register') }}"> <button class="bg-gray-900 text-white p-1 rounded-sm mt-2 w-64 ">Appoint Now</button></a>
                    </div>


                </div>
            </div>
        </div>

        <div id="about" class="section hidden">
            <div class="container mx-auto py-10">
                <h2 class="text-3xl font-bold mb-6">About Us</h2>
                <p>Information about ICFC, its mission, vision, and community initiatives can be shared here.</p>
            </div>
        </div>
    </main>

    <footer class="bg-amber-900 text-white text-center py-4">
        <div class="container mx-auto">
            <p class="text-sm">&copy; {{ now()->year }} Independent Church of Filipino Christians. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
