<div class="bg-gray-100 h-screen flex items-start justify-center -mt-10 -mx-10">
    <div class="bg-white shadow-lg rounded-lg p-8 w-96 mt-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create Article</h2>

        <form wire:submit="signUp">
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-semibold mb-2">
                    Name: <span wire:dirty.remove wire:target="name" class="text-red-500"> * </span>
                </label>
                <input
                    type="text"
                    id="name"
                    wire:model="name"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('form.title') border-red-500 ring-2 ring-red-500 focus:ring-2 focus:ring-red-500 @enderror"
                    placeholder="john Doe"
                />
            </div>
            @error('name')
                <span class="text-red-500 font-bold italic">{{ $message }}</span>
            @enderror

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-semibold mb-2">
                    email: <span wire:dirty.remove wire:target="email" class="text-red-500"> * </span>
                </label>
                <input
                    type="email"
                    id="email"
                    wire:model="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('form.title') border-red-500 ring-2 ring-red-500 focus:ring-2 focus:ring-red-500 @enderror"
                    placeholder="example@com"
                />
            </div>
            @error('email')
                <span class="text-red-500 font-bold italic">{{ $message }}</span>
            @enderror


            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-semibold mb-2">
                    Password: <span wire:dirty.remove wire:target="password" class="text-red-500"> * </span>
                </label>
                <input
                    type="password"
                    id="password"
                    wire:model="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('form.title') border-red-500 ring-2 ring-red-500 focus:ring-2 focus:ring-red-500 @enderror"
                    placeholder="example@com"
                />
            </div>
            @error('password')
                <span class="text-red-500 font-bold italic">{{ $message }}</span>
            @enderror

            <!-- Submit Button -->
            <div class="text-center flex fex-row items-center justify-center gap-4">
                <button
                    type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition duration-300 disabled:opacity-75  disabled:bg-indigo-600"
                />
                Sign up
                </button>
                <a href="/" class="px-6 py-2 bg-gray-500 hover:bg-gray-700 transition duration-300 text-white rounded-md" wire:navigate> Back </a>
            </div>
        </form>
    </div>
</div>
