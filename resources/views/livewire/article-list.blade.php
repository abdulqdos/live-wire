<div class="space-y-4">
    <div wire:offline class="flex items-center text-xl text-red-500 font-semibold italic text-center">
        You are currently offline
    </div>
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
        @if ($showDeleteModal)
            <div class="fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center z-50" wire:click="cancelDelete">
                <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
                    <h3 class="text-lg font-semibold">Are you sure you want to delete this article?</h3>
                    <div class="mt-4 flex justify-between">
                        <button wire:click="confirmDelete" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-800 transition duration-300">Delete</button>
                        <button wire:click="cancelDelete" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-800 transition duration-300">Cancel</button>
                    </div>
                </div>
            </div>
        @endif

    <div class="flex justify-between items-center bg-gray-800 text-white px-6 py-4 rounded-lg shadow-md">
        <a href="{{ route('dashboard.articles.create') }}"
           wire:navigate
           wire:offline.attr="disabled"
           wire:offline.class.remove="bg-indigo-600 hover:bg-indigo-700"
           class="bg-indigo-600 text-white px-4 py-2 rounded-lg shadow hover:bg-indigo-700 transition duration-300 disabled:opacity-75 disabled:cursor-default"
        >
            Add New Article
        </a>

        <div>
            <button
                @class([
                    "text-white px-4 py-2 rounded-lg shadow  transition duration-300",
                    "bg-indigo-600 hover:bg-indigo-700 cursor-pointer" => $published,
                    "bg-indigo-600 bg-opacity-50 cursor-default" => !$published,
                ])
                wire:click="togglePublished">
                Show All
            </button>
            <button
                @class([
                        "text-white px-4 py-2 rounded-lg shadow  transition duration-300",
                        "bg-indigo-600 hover:bg-indigo-700 cursor-pointer" => !$published,
                        "bg-indigo-600 bg-opacity-50 cursor-default" => $published,
                ])
                wire:click="togglePublished(true)">
                Show Published (<livewire:published-count lazy  />)
            </button>
        </div>
    </div>

    <div class="mt-4 flex justify-between items-center">
        <button wire:click="previousPage('{{ $pageName }}')" class="bg-gray-600 hover:bg-gray-800 text-white px-4 py-2 rounded-lg shadow transition duration-300 cursor-pointer  disabled:bg-gray-400 disabled:opacity-75 disabled:cursor-default" @if ($this->articles->onFirstPage()) disabled @endif>
            << Previous
        </button>
        <div class="text-gray-800 text-xl">
            Showing
            <span class="font-bold">{{ $this->articles->firstItem() }}</span>
            to
            <span class="font-bold">{{ $this->articles->lastItem() }}</span>
            of
            <span class="font-bold">{{ $this->articles->total() }}</span>
            results
        </div>
        <button wire:click="nextPage('{{ $pageName }}')" class="bg-gray-600 hover:bg-gray-800 text-white px-4 py-2 rounded-lg shadow transition duration-300 cursor-pointer disabled:bg-gray-400 disabled:opacity-75 disabled:cursor-default" @if (!$this->articles->hasMorePages()) disabled @endif>
            Next >>
        </button>
    </div>

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
            @foreach($this->articles as $index => $article)
                <tr class="border-b bg-white hover:bg-gray-200 transition duration-300">
                    <td class="px-6 py-3 text-gray-700">{{ $index + 1 }}</td>
                    <td class="px-6 py-3 text-indigo-600 font-semibold">
                        <a href="/dashboard/article/{{$article->id}}" wire:navigate class="hover:underline">
                            {{ $article->title }}
                        </a>
                    </td>
                    <td class="px-6 py-3 text-gray-600">
                        {{ Str($article->content)->words(15) }}
                    </td>
                    <td class="px-6 py-3 text-center flex flex-row gap-4">
                        <a href="{{ route('dashboard.articles.edit', ['article' => $article->id]) }}" class="bg-green-600 text-white px-3 py-1 rounded-lg shadow hover:bg-green-800 transition duration-300" wire:navigate>
                            Update
                        </a>
                        <button wire:click="delete({{ $article }})" class="bg-red-500 text-white px-3 py-1 rounded-lg shadow hover:bg-red-600 transition duration-300">
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
