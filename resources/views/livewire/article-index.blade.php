
<div class="space-y-4 flex flex-col items-center">
    @if (session('success'))
        <div id="alert" class="fixed top-24 right-0 m-6 bg-green-500 text-white p-4 rounded-lg shadow-md flex items-center space-x-4" role="alert">
            <span>{{ session('success') }}</span>
            <button onclick="document.getElementById('alert').style.display = 'none'" class="ml-4 text-white focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    @endif
    @foreach($articles as $article)
        <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-300 w-1/2" wire:key="{{ $article->id }}">
            <!-- Title -->
            <a href="article/{{ $article->id }}" wire:navigate class="text-xl font-semibold text-gray-800 hover:text-indigo-500 transition duration-300  cursor-pointer">{{ $article->title }}</a>
            <!-- Content -->
            <p class="text-gray-600 mt-2">{{ Str($article->content)->words(50) }}</p>
        </div>
    @endforeach
</div>
