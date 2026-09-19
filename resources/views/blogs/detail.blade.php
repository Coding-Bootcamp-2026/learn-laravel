<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Blog</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold">Detail Blog</h1>
            <a href="{{ route('blogs.index') }}" class="text-white bg-gray-600 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6">
            <div class="mb-4">
                <h2 class="text-3xl font-semibold text-gray-900 mb-3">{{ $blog->title }}</h2>
                <div class="mb-4">
                    @if ($blog->status == 'Active')
                        <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-green-800 bg-green-100 rounded-full">
                            {{ $blog->status }}
                        </span>
                    @else
                        <span class="inline-flex items-center px-3 py-1 text-sm font-medium text-red-800 bg-red-100 rounded-full">
                            {{ $blog->status }}
                        </span>
                    @endif
                </div>
            </div>

            <hr class="my-6 border-gray-200">

            <div class="prose max-w-none text-gray-700">
                <p class="whitespace-pre-line text-lg">
                    {{ $blog->deskripsi }}
                </p>
            </div>

            <div class="mt-8 text-sm text-gray-500 border-t pt-4">
                <p>Dibuat pada: {{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y H:i') }}</p>
                <p>Terakhir diupdate: {{ \Carbon\Carbon::parse($blog->updated_at)->format('d M Y H:i') }}</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>

</html>
