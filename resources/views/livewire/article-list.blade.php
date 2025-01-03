
<div class="space-y-4 flex flex-col items-center">
    @foreach($articles as $article)
        <div class="bg-white shadow-lg rounded-lg p-4 border border-gray-300 w-1/2" wire:key="{{ $article->id }}">
            <!-- Title -->
            <a href="article/{{ $article->id }}" wire:navigate class="text-xl font-semibold text-gray-800 hover:text-indigo-500 transition duration-300  cursor-pointer">{{ $article->title }}</a>
            <!-- Content -->
            <p class="text-gray-600 mt-2">{{ Str($article->content)->words(50) }}</p>
        </div>
    @endforeach
</div>
