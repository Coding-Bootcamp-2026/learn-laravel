<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title ?? 'Detail Artikel' }}</title>

    <!-- Tailwind CSS v4 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <style>
        /* Tipografi modern */
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=Merriweather:ital,wght@0,300;0,400;0,700;1,300&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }

        /* Font khusus untuk isi artikel agar lebih nyaman dibaca (seperti Medium/Substack) */
        .article-content {
            font-family: 'Merriweather', serif;
        }
    </style>
</head>

<body class="text-slate-800 antialiased min-h-screen pb-20 selection:bg-indigo-200 selection:text-indigo-900">

    <!-- Navigasi / Tombol Kembali -->
    <nav class="max-w-4xl mx-auto pt-8 px-4 sm:px-6 lg:px-8">
        <a href="{{ route('blogs.index') }}"
            class="inline-flex items-center text-sm font-semibold text-slate-500 hover:text-indigo-600 group transition-colors duration-200">
            <span
                class="bg-white p-2 rounded-full shadow-sm ring-1 ring-slate-200 group-hover:ring-indigo-200 group-hover:bg-indigo-50 mr-3 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
            </span>
            Kembali ke Daftar Artikel
        </a>
    </nav>

    <main class="max-w-4xl mx-auto mt-8 px-4 sm:px-6 lg:px-8">

        <article
            class="bg-white rounded-[2rem] p-8 sm:p-14 shadow-sm ring-1 ring-slate-200/60 relative overflow-hidden">
            <!-- Dekorasi artistik di pojok -->
            <div
                class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-full opacity-50 blur-3xl pointer-events-none">
            </div>

            <!-- Header Artikel -->
            <header class="mb-12 text-center sm:text-left relative z-10">
                <h1
                    class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 tracking-tight leading-[1.2] mb-8">
                    {{ $blog->title }}
                </h1>

                <div
                    class="flex flex-col sm:flex-row sm:items-center justify-between border-b border-slate-100 pb-8 gap-6">
                    <!-- Info Penulis -->
                    <div class="flex items-center justify-center sm:justify-start">
                        <div
                            class="w-14 h-14 rounded-full bg-indigo-50 border border-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-xl shadow-inner">
                            {{ strtoupper(substr($blog->user->name ?? 'A', 0, 1)) }}
                        </div>
                        <div class="ml-4 text-left">
                            <p class="text-base font-bold text-slate-900">
                                {{ $blog->user->name ?? 'Anonim' }}
                            </p>
                            <p class="text-sm text-slate-500 font-medium mt-0.5">
                                Penulis / Kontributor
                            </p>
                        </div>
                    </div>

                    <!-- Info Tanggal -->
                    <div
                        class="flex items-center justify-center sm:justify-end text-sm text-slate-500 bg-slate-50 px-5 py-2.5 rounded-2xl border border-slate-100">
                        <svg class="w-5 h-5 mr-2.5 text-slate-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                        <time datetime="{{ $blog->created_at }}">
                            <span
                                class="font-semibold text-slate-700">{{ $blog->created_at ? $blog->created_at->format('d M Y') : 'Tanggal tidak diketahui' }}</span>
                            <span class="mx-1 text-slate-300">|</span>
                            {{ $blog->created_at ? $blog->created_at->format('H:i') : '' }}
                        </time>
                    </div>
                </div>
            </header>

            <!-- Isi / Konten Artikel -->
            <div class="article-content text-lg text-slate-700 leading-[1.8] space-y-6 relative z-10">
                <!--
                  Menggunakan nl2br(e()) karena berasumsi teks berasal dari textarea standar (mencegah XSS namun mempertahankan baris baru).
                  Jika Anda menggunakan Rich Text Editor (seperti CKEditor/TinyMCE), ganti baris di bawah dengan: {!! $blog->deskripsi !!}
                -->
                {!! nl2br(e($blog->deskripsi ?? 'Konten artikel tidak tersedia.')) !!}
            </div>
        </article>

        <!-- Action Buttons (Edit) -->
        <div class="mt-8 flex justify-end gap-3 mb-10">
            <a href="{{ route('blogs.edit', $blog->id ?? 1) }}"
                class="inline-flex items-center px-5 py-2.5 border border-slate-200 rounded-xl text-sm font-semibold text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-sm transition-all duration-200 hover:-translate-y-0.5">
                <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                    </path>
                </svg>
                Edit Artikel
            </a>
        </div>

        <!-- Bagian Komentar -->
        <section
            class="bg-white rounded-[2rem] p-8 sm:p-14 shadow-sm ring-1 ring-slate-200/60 relative overflow-hidden mt-10">
            <h3 class="text-2xl font-bold text-slate-900 mb-8 flex items-center">
                <svg class="w-6 h-6 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                    </path>
                </svg>
                Komentar ({{ isset($blog->comments) ? $blog->comments->count() : 0 }})
            </h3>

            <!-- Form Tambah Komentar -->
            <form action="{{ route('comments.store', ['blogId' => $blog->id]) }}" method="POST"
                class="mb-12 relative z-10">
                @csrf
                <input type="hidden" name="blog_id" value="{{ $blog->id }}">

                <div class="grid grid-cols-1 gap-6 mb-6">
                    <div>
                        <label for="commenter_name" class="block mb-2 text-sm font-semibold text-slate-700">Nama
                            Lengkap</label>
                        <input type="text" id="commenter_name" name="commenter_name"
                            class="w-full rounded-xl border-slate-300 bg-slate-50 border px-4 py-3 text-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none transition-colors"
                            placeholder="Masukkan nama Anda..." required>
                    </div>

                    <div>
                        <label for="comment_text" class="block mb-2 text-sm font-semibold text-slate-700">Tulis
                            Komentar</label>
                        <textarea id="comment_text" name="comment_text" rows="4"
                            class="w-full rounded-xl border-slate-300 bg-slate-50 border px-4 py-3 text-sm focus:border-indigo-500 focus:ring-indigo-500 outline-none transition-colors"
                            placeholder="Bagikan pendapat Anda tentang artikel ini..." required></textarea>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit"
                        class="inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-sm font-bold rounded-xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-md hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-200">
                        Kirim Komentar
                    </button>
                </div>
            </form>

            <hr class="border-slate-100 mb-10">

            <!-- Daftar Komentar -->
            <div class="space-y-6 relative z-10">
                @if (isset($blog->comments) && $blog->comments->count() > 0)
                    @foreach ($blog->comments as $comment)
                        <div
                            class="flex gap-4 p-5 bg-slate-50/70 rounded-2xl border border-slate-100 hover:border-slate-200 transition-colors">
                            <div class="flex-shrink-0 mt-1">
                                <div
                                    class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-lg shadow-sm border border-indigo-200/50">
                                    {{ strtoupper(substr($comment->commenter_name, 0, 1)) }}
                                </div>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between mb-1">
                                    <h4 class="font-bold text-slate-900">{{ $comment->commenter_name }}</h4>
                                    <span
                                        class="text-xs font-semibold text-slate-500 bg-white px-2.5 py-1 rounded-md border border-slate-100 shadow-sm">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                                </div>
                                <p class="text-slate-700 text-sm leading-relaxed mt-2">{{ $comment->comment_text }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Empty State Komentar -->
                    <div class="text-center py-12 bg-slate-50/50 rounded-2xl border border-dashed border-slate-200">
                        <div
                            class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 shadow-sm ring-1 ring-slate-100">
                            <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                                </path>
                            </svg>
                        </div>
                        <p class="text-slate-600 font-semibold text-lg">Belum ada komentar.</p>
                        <p class="text-sm text-slate-500 mt-1">Jadilah yang pertama membagikan pendapat Anda!</p>
                    </div>
                @endif
            </div>
        </section>

    </main>
</body>

</html>
