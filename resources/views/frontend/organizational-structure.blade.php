<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hulas Remittance</title>
</head>

<body>
    <div id="navbar"></div>



    <div id="footer"></div>


</body>

</html>

@extends('frontend.layouts.app')
@section('title', 'Home')
@section('meta', 'Welcome to Hulas Remittance')
@section('content')

    <!-- Organizational Structure -->
    <!-- board memver  -->
    <div class="container m-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-left mb-8">Board member</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6 ml-8 mr-8">
            <!-- Board Member - 1 -->
            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5lSFDKzM3JBM8MxUuwN1pwM7uL9b4Kq17bQ&s"
                    alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />
                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>

            <!--board member - 2) -->
            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="https://cdn.oneesports.gg/cdn-data/2024/04/Anime_OnePiece_Zoro_Sword_Attack.jpg" alt="Zorro"
                    class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Zorro</h3>
                <p class="text-gray-600 text-sm">Consulting CA</p>
            </div>

            <!-- Board Member - 3 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPJY9ctoAR-t6S_PCqdk7FatZyXbU8tpadlg&s"
                    alt="Sanzi" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Sanji</h3>
                <p class="text-gray-600 text-sm">Head of Partnership</p>
            </div>
        </div>
    </div>

    <!-- next for the team member -->

    <div class="container mx-auto px-4 py-12 rounded-3xl">
        <h2 class="text-3xl font-bold text-left mb-8">Our Team</h2>

        <div class="grid grid-cols-1 rounded-lg sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 ml-8 mr-8">
            <!-- Team Member - 1 -->
            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="" alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />
                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>

            <!-- Team Member - 2 -->
            <div class="bg-white shadow-lg p-4 flex flex-col items-center">
                <img src="https://via.placeholder.com/150" alt="Zorro" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Zorro</h3>
                <p class="text-gray-600 text-sm">Consulting CA</p>
            </div>

            <!-- Team Member - 3 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="https://via.placeholder.com/150" alt="Sanzi" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Sanji</h3>
                <p class="text-gray-600 text-sm">Head of Partnership</p>
            </div>

            <!-- Team Member - 4 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="https://via.placeholder.com/150" alt="ussop" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Ussop</h3>
                <p class="text-gray-600 text-sm">Intl Business Development</p>
            </div>

            <!-- Team Member - 5 -->
            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="" alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>

            <!-- Team Member - 6 -->
            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="https://via.placeholder.com/150" alt="Zorro" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Zorro</h3>
                <p class="text-gray-600 text-sm">Consulting CA</p>
            </div>

            <!-- Team Member - 7 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="https://via.placeholder.com/150" alt="Sanzi" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Sanji</h3>
                <p class="text-gray-600 text-sm">Head of Partnership</p>
            </div>

            <!-- Team Member - 8 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="https://via.placeholder.com/150" alt="ussop" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Ussop</h3>
                <p class="text-gray-600 text-sm">Intl Business Development</p>
            </div>

            <!-- Team Member - 9 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="" alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>

            <!-- Team Member - 10 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="" alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>

            <!-- Team Member - 11 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="" alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>

            <!-- Team Member - 12 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="" alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>

            <!-- Team Member - 13 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="" alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>

            <!-- Team Member - 14 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="" alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>

            <!-- Team Member - 15 -->

            <div class="bg-white rounded-lg shadow-lg p-4 flex flex-col items-center">
                <img src="" alt="Luffy" class="rounded-lg mb-4 w-40 h-40 object-cover" />

                <h3 class="text-lg font-semibold mt-4">Luffy</h3>
                <p class="text-gray-600 text-sm">CEO</p>
            </div>
        </div>
    </div>

    <!-- End -->
@endsection


@push('scripts')
    <script type="module" src="/src/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
@endpush
