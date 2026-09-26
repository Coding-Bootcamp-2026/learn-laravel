<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blog</title>

    <!-- Menggunakan Tailwind CSS v4 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        /* Menggunakan font Plus Jakarta Sans untuk kesan modern dan rapi */
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        /* Fallback class line-clamp jika CDN bermasalah */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="text-slate-800 antialiased min-h-screen">

    <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
            <div>
                <h1 class="text-4xl font-extrabold tracking-tight text-slate-900 sm:text-5xl">Kumpulan Artikel</h1>
                <p class="mt-4 text-lg text-slate-600 max-w-2xl">
                    Jelajahi berbagai cerita, wawasan, dan inspirasi terbaru dari penulis kami.
                </p>
            </div>
            <div>
                <a href="{{ route('blogs.create') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Tulis Blog Baru
                </a>
            </div>
        </div>

        <!-- Grid Section untuk Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($blogs ?? [] as $blog)
                <div class="group flex flex-col bg-white rounded-3xl p-6 shadow-sm ring-1 ring-slate-200/60 hover:shadow-xl hover:ring-indigo-100 hover:-translate-y-1 transition-all duration-300 relative overflow-hidden h-full">

                    <!-- Decorative Gradient element (Top bar hover effect) -->
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-out"></div>

                    <!-- Date & Meta Info -->
                    <div class="flex items-center justify-between text-sm text-slate-500 mb-4 mt-2">
                        <div class="flex items-center bg-slate-50 px-2.5 py-1 rounded-md border border-slate-100">
                            <svg class="w-4 h-4 mr-1.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            <time datetime="{{ $blog->created_at }}">
                                {{ $blog->created_at ? $blog->created_at->format('d M Y') : '-' }}
                            </time>
                        </div>
                    </div>

                    <!-- Title -->
                    <h3 class="text-xl font-bold text-slate-900 mb-3 leading-snug group-hover:text-indigo-600 transition-colors">
                        <a href="{{ route('blogs.detail', $blog->id) }}" class="focus:outline-none">
                            <span class="absolute inset-0" aria-hidden="true"></span>
                            {{ $blog->title }}
                        </a>
                    </h3>

                    <!-- Short Description (Excerpt) -->
                    <p class="text-slate-600 line-clamp-3 mb-8 flex-1 text-sm leading-relaxed">
                        {{ $blog->deskripsi }}
                    </p>

                    <!-- Author Footer -->
                    <div class="mt-auto pt-5 border-t border-slate-100 flex items-center z-10 relative bg-white">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 rounded-full bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm shadow-inner">
                                {{ strtoupper(substr($blog->user->name ?? 'A', 0, 1)) }}
                            </div>
                        </div>
                        <div class="ml-3 flex-1">
                            <p class="text-sm font-semibold text-slate-900 truncate">
                                {{ $blog->user->name ?? 'Anonim' }}
                            </p>
                            <p class="text-xs text-slate-500 font-medium">
                                Penulis
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-full flex flex-col items-center justify-center py-20 bg-white rounded-3xl border-2 border-dashed border-slate-200 shadow-sm">
                    <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-5 ring-4 ring-slate-50/50">
                        <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-slate-900">Belum ada artikel</h3>
                    <p class="mt-2 text-slate-500 text-center max-w-sm">Jadilah yang pertama untuk membagikan cerita dan wawasan dengan menekan tombol <strong class="text-slate-700">Tulis Blog Baru</strong>.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>
