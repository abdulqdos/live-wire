<div class="flex flex-col items-center">
    <div class="w-1/2 shadow-lg rounded-lg p-6 border border-gray-300 mb-6">
        {{-- The whole world belongs to you. --}}
        <h2 class="text-2xl font-semibold text-gray-800 hover:text-indigo-500 transition duration-300 mb-2">{{ $article->title }}</h2>
        <div class="text-gray-600">
            {{ $article->content }}
        </div>
    </div>
</div>


