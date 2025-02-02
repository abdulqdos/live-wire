<div class="flex flex-col items-center">
    <div class="w-1/2 shadow-lg rounded-lg p-6 border border-gray-300 mb-6">
        @if($article->photo_path)
        <div class="flex flex-col items-center justify-center gap-4 mb-4">
            <img class="max-w-40 rounded-full" src="{{ \Illuminate\Support\Facades\Storage::url($article->photo_path) }}">
            <button
                class="bg-indigo-600 text-white cursor-pointer hover:bg-indigo-700 transition duration-300 py-2 px-4 rounded-md"
                wire:click="downloadPhoto"
            > Download </button>
        </div>
        @endif
        <h2 class="text-2xl font-semibold text-gray-800 hover:text-indigo-500 transition duration-300 mb-2">{{ $article->title }}</h2>
        <div class="text-gray-600">
            {{ $article->content }}
        </div>
    </div>
</div>


