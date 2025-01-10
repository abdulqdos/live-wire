<div class="space-y-4">
    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded-lg mb-4 flex justify-between items-center">
            <span>{{ session('success') }}</span>
            <button wire:click="closeSuccessMessage" class="text-white hover:text-gray-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    @endif

    <!-- Header Section -->
    <div class="flex justify-between items-center bg-gray-800 text-white px-6 py-4 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold">My Articles</h1>
        <a href="{{ route('create-article') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-300">
            Add New Article
        </a>
    </div>

    <!-- Table Section -->
    <div class="bg-white shadow-lg rounded-lg border border-gray-300">
        <table class="min-w-full border-collapse">
            <thead class="bg-gray-800 border-b text-white font-bold italic">
            <tr>
                <th class="text-left px-6 py-3">#</th>
                <th class="text-left px-6 py-3">Title</th>
                <th class="text-left px-6 py-3">Content</th>
                <th class="text-center px-6 py-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($articles as $index => $article)
                <tr class="border-b hover:bg-gray-50">
                    <!-- Index -->
                    <td class="px-6 py-3 text-gray-700">{{ $index + 1 }}</td>

                    <!-- Title -->
                    <td class="px-6 py-3 text-indigo-600 font-semibold">
                        <a href="/dashboard/article/{{$result->id}}" wire:navigate class="hover:underline">
                            {{ $article->title }}
                        </a>
                    </td>

                    <!-- Content -->
                    <td class="px-6 py-3 text-gray-600">
                        {{ Str($article->content)->words(15) }}
                    </td>

                    <!-- Actions -->
                    <td class="px-6 py-3 text-center flex flex-row gap-4">
                        <a href=" {{ route('edit-article' , ['article' => $article->id]) }}" class="bg-green-600 text-white px-3 py-1 rounded-lg shadow hover:bg-green-800 transition duration-300">
                            Update
                        </a>

                        <button wire:click="delete({{$article}})" class="bg-red-500 text-white px-3 py-1 rounded-lg shadow hover:bg-red-600 transition duration-300">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

