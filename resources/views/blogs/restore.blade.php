<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restore Blogs</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between w-full mb-6">
            <h1 class="text-4xl font-bold">Trash (Deleted Blogs)</h1>
            <div class="flex space-x-3 items-center">
                <a href="{{ route('blogs.index') }}" type="button"
                    class="text-white bg-gradient-to-r rounded-lg from-gray-500 via-gray-600 to-gray-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-gray-300 shadow-lg font-medium text-sm px-4 py-2.5 text-center">Back
                    to Blogs</a>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 border border-green-400 text-green-800 rounded">
                {{ session('success') }}</div>
        @elseif (session('failed'))
            <div class="mb-4 px-4 py-2 bg-red-100 border border-red-400 text-red-800 rounded">
                {{ session('failed') }}</div>
        @endif

        <div class="overflow-x-auto rounded-lg shadow mb-5">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">No</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Title</th>
                        <th scope="col" class="px-6 py-4 font-medium text-gray-900">Deleted At</th>
                        <th scope="col" class="w-1/4 text-center font-medium text-gray-900">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($blogs as $blog)
                        <tr>
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $blog->title }}</td>
                            <td class="px-6 py-4">{{ $blog->deleted_at->format('d M Y H:i') }}</td>
                            <td class="px-6 py-4 text-sm text-center space-x-2">
                                <form action="{{ route('blogs.restore', $blog->id) }}" method="GET" class="inline">
                                    @csrf
                                    <button onclick="return confirm('Are you sure want to restore this?')"
                                        class="inline-block px-3 py-1 text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">Restore</button>
                                </form>
                                <form action="{{ url('blogs/' . $blog->id . '/force-delete') }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure want to delete permanently?')"
                                        class="inline-block px-3 py-1 text-red-600 border border-red-600 rounded hover:bg-red-600 hover:text-white transition">Force Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-lg py-6 text-gray-500">
                                No deleted blogs found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>

</html>
