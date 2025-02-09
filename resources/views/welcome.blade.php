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
                <div class="w-1/2 flex justify-center ">
                    <img src="{{ asset('images/ch2.jpg') }}" alt="Church Logo" class="max-w-full h-auto">
                </div>
            </div>
        </div>

        <div id="services" class="section hidden">
            <div class="container mx-auto py-10">
                <h2 class="text-3xl font-bold mb-6 text-center">Our Services</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <h3 class="text-xl font-semibold mb-2">Wedding</h3>
                        <img src="{{ asset('images/wed.png') }}" alt="">
                        <p class="text-gray-600">Celebrate your union in a sacred and memorable ceremony.</p>
                       <a href="{{ route('register') }}"> <button class="bg-gray-900 text-white p-1 rounded-sm mt-2 w-64 ">Appoint Now</button></a>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <h3 class="text-xl font-semibold mb-2">Baptism</h3>
                        <img src="{{ asset('images/baptism.png') }}" alt="">
                        <p class="text-gray-600">Begin your spiritual journey with the blessing of baptism.</p>
                       <a href="{{ route('register') }}"> <button class="bg-gray-900 text-white p-1 rounded-sm mt-2 w-64 ">Appoint Now</button></a>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-6 text-center">
                        <h3 class="text-xl font-semibold mb-2">Funeral</h3>
                        <img src="{{ asset('images/fune.png') }}" alt="">
                        <p class="text-gray-600">Honoring and celebrating the life of your loved ones.</p>
                       <a href="{{ route('register') }}"> <button class="bg-gray-900 text-white p-1 rounded-sm mt-2 w-64 ">Appoint Now</button></a>
                    </div>


                </div>
            </div>
        </div>

        <div id="about" class="section hidden">
            <div class="container mx-auto py-10">
                <div class="max-w-6xl mx-auto p-6">

                    <div class="bg-white shadow-lg rounded-lg p-8">
                        <h1 class="text-3xl font-bold text-center text-gray-700">About Us</h1>
                        <p class="mt-4 text-gray-700 text-justify leading-relaxed">
                            Welcome to <strong>Parroquia ni Sta. Teresa de Jesus (Aglipay Memorial Church)</strong>! Nestled in the heart of Ramos, Tarlac, our parish is a proud part of the <strong>Iglesia Filipina Independiente (IFI)</strong>, a historic church born out of the Filipino people's desire for independence in faith and governance.
                        </p>
                        <p class="mt-2 text-gray-700 text-justify leading-relaxed">
                            Founded in 1902, the IFI continues to serve as a beacon of faith, justice, and community service for Filipinos. Our parish is dedicated to <strong>Sta. Teresa de Avila</strong>, a revered saint known for her deep spirituality, reformist work, and unwavering faith. Inspired by her teachings, we aim to foster a community rooted in prayer, compassion, and a commitment to spiritual and social transformation.
                        </p>
                        <p class="mt-2 text-gray-700 text-justify leading-relaxed">
                            Beside the Ramos Town Hall in <strong>Tarlac Town Proper</strong>, our church serves the communities of Barangay Poblacion North, Poblacion South, and Poblacion Center, extending its reach along Ramos-Anao, Tarlac Road, and beyond.
                        </p>
                    </div>

                    <!-- Mission, Vision, Commitment -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

                        <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-green-500">
                            <h2 class="text-xl font-bold text-green-700">Mission</h2>
                            <p class="mt-2 text-gray-700 leading-relaxed">
                                To empower the marginalized and oppressed through education, organization, and mobilization, fostering justice, equality, and social transformation rooted in faith.
                            </p>
                        </div>

                        <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-blue-500">
                            <h2 class="text-xl font-bold text-blue-700">Vision</h2>
                            <p class="mt-2 text-gray-700 leading-relaxed">
                                To establish a Philippine society characterized by justice, peace, and freedom from foreign domination, where Filipinos actively witness God's love in their lives and communities.
                            </p>
                        </div>


                        <div class="bg-white shadow-md rounded-lg p-6 border-l-4 border-red-500">
                            <h2 class="text-xl font-bold text-red-700">Commitment</h2>
                            <p class="mt-2 text-gray-700 leading-relaxed">
                                At the Aglipay Memorial Church, we celebrate the richness of Filipino spirituality, inspired by the teachings of <strong>Gregorio Aglipay</strong>, the first Obispo Máximo of the IFI. We remain steadfast in our mission to be a sanctuary of hope, a source of inspiration, and a force for positive change in the lives of our parishioners and the community of Ramos, Tarlac.
                            </p>
                        </div>
                    </div>
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
