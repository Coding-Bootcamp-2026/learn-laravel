<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Nomor Telepon 📱✨</title>
    
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <script src="https://cdn.tailwindcss.com"></script>
    @endif
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap');
        body {
            font-family: 'Quicksand', sans-serif;
        }
        /* Custom scrollbar super cute */
        ::-webkit-scrollbar {
            width: 10px;
        }
        ::-webkit-scrollbar-track {
            background: #fce7f3; 
        }
        ::-webkit-scrollbar-thumb {
            background: #f9a8d4; 
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #f472b6; 
        }
    </style>
</head>
<body class="bg-gradient-to-br from-pink-100 via-purple-100 to-pink-200 min-h-screen flex flex-col items-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-4xl w-full bg-white rounded-[2rem] shadow-2xl shadow-pink-300/50 overflow-hidden border-4 border-pink-200 relative">
        
        <!-- Header Section -->
        <div class="bg-pink-300 py-8 px-8 text-center border-b-4 border-pink-200 relative overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute -left-6 -top-6 w-24 h-24 bg-pink-200 rounded-full opacity-60"></div>
            <div class="absolute right-4 bottom-2 w-12 h-12 bg-pink-400 rounded-full opacity-40"></div>
            <div class="absolute left-1/4 -bottom-4 w-16 h-16 bg-purple-300 rounded-full opacity-30"></div>
            
            <h1 class="text-4xl font-extrabold text-pink-900 tracking-wide drop-shadow-sm z-10 relative">
                🌸 Buku Telepon Teman-Teman 🌸
            </h1>
            <p class="text-pink-800 mt-3 font-semibold text-lg z-10 relative">
                Daftar nomor HP dan provider yang super cute! ✨
            </p>
        </div>

        <!-- Table Section -->
        <div class="p-6 sm:p-8 bg-white/60 backdrop-blur-md">
            <div class="overflow-x-auto rounded-3xl border-4 border-pink-100 shadow-sm bg-white">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-gradient-to-r from-pink-200 to-purple-200 text-pink-900 uppercase text-sm leading-normal">
                            <th class="py-4 px-6 font-extrabold text-center w-20 rounded-tl-2xl">No.</th>
                            <th class="py-4 px-6 font-extrabold">Provider 📡</th>
                            <th class="py-4 px-6 font-extrabold">Phone Number ☎️</th>
                            <th class="py-4 px-6 font-extrabold rounded-tr-2xl">Owner 👤</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-medium">
                        @forelse ($phones ?? [] as $index => $phone)
                        <tr class="border-b-2 border-pink-50 hover:bg-pink-50/80 transition-colors duration-300 group">
                            <td class="py-4 px-6 text-center font-bold text-pink-500 group-hover:scale-110 transition-transform">
                                {{ $index + 1 }}
                            </td>
                            <td class="py-4 px-6">
                                <span class="bg-purple-100 text-purple-700 py-1.5 px-4 rounded-full text-xs font-bold border-2 border-purple-200 shadow-sm inline-block transform group-hover:-rotate-3 transition-transform">
                                    {{ $phone->provider_name }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-gray-700 font-bold tracking-wider text-base">
                                {{ $phone->phone_number }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 rounded-full bg-pink-200 flex items-center justify-center text-pink-700 font-extrabold mr-3 border-2 border-pink-400 shadow-sm">
                                        {{ strtoupper(substr($phone->user->name ?? '?', 0, 1)) }}
                                    </div>
                                    <span class="text-gray-800 font-bold text-base">{{ $phone->user->name ?? 'Tanpa Pemilik' }}</span>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-16 px-6 text-center text-pink-400 font-bold text-xl bg-pink-50/50">
                                🥺 Wah, belum ada nomor telepon yang terdaftar nih...<br>
                                <span class="text-sm font-medium text-pink-300 mt-2 block">Ayo tambahkan teman barumu!</span>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="bg-pink-100/50 p-5 border-t-4 border-pink-100 flex justify-center items-center gap-2">
            <p class="text-pink-500 text-sm font-bold tracking-wide">Made with 💖 in Laravel</p>
        </div>
    </div>

</body>
</html>
