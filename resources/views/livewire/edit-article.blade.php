<div class="bg-gray-100 h-screen flex items-start justify-center -mt-10 -mx-10">
    <div class="bg-white shadow-lg rounded-lg p-8 w-96 mt-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Update New Article</h2>

        <form wire:submit="save">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
                <input
                    type="text"
                    id="title"
                    wire:model.live="form.title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('form.title') border-red-500 ring-2 ring-red-500 focus:ring-2 focus:ring-red-500 @enderror"
                    value="form.title"
                />

            </div>
            @error('form.title')
            <span class="text-red-500 font-bold italic"> {{ $message }}</span>
            @enderror
            <div class="mb-6">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Content:</label>
                <textarea
                    id="content"
                    rows="4"
                    wire:model.live="form.content"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('form.content') border-red-500 ring-2 ring-red-500 focus:ring-2 focus:ring-red-500 @enderror"
                    value="forms.content"
                ></textarea>
            </div>
            @error('form.content')
            <span class="text-red-500 font-bold italic"> {{ $message }}</span>
            @enderror
            <!-- Submit Button -->
            <div class="text-center flex fex-row items-center justify-center gap-4">
                <button
                    type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition duration-300">
                    Submit
                </button>
                <a href="/dashboard/articles" class="px-6 py-2 bg-gray-500 hover:bg-gray-700 transition duration-300 text-white rounded-md"> Back </a>
            </div>
        </form>
    </div>
</div>
