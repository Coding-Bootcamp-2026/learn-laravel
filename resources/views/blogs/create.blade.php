<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Blog</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between w-full mb-6">
            <h1 class="text-6xl font-bold mb-4">Create Blog</h1>
        </div>

        <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
            {{-- @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">
                            {{ $error }}
                        </div>
                    @endforeach
                </ul>
            @endif --}}
            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        class="@error('title') border-red-300 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        placeholder="Enter blog title">
                    @error('title')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-5">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900">Upload Image</label>
                    <input type="file" id="image" name="image" 
                        class="@error('image') border-red-300 @enderror block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                    @error('image')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter blog description">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                    <select id="status" name="status"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                    @error('status')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Tags</label>
                    <div class="flex flex-wrap gap-4">
                        @foreach ($tags ?? [] as $tag)
                            <div class="flex items-center">
                                <input id="tag-{{ $tag->id }}" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                                <label for="tag-{{ $tag->id }}" class="ms-2 text-sm font-medium text-gray-900">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="flex items-center space-x-3 mt-8">
                    <button type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Save</button>
                    <a href="{{ url('/blogs') }}"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>

</html>
