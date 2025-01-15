<div class="bg-gray-100 h-screen flex items-start justify-center -mt-10 -mx-10">
    <div class="bg-white shadow-lg rounded-lg p-8 w-96 mt-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Create Article</h2>

        <form wire:submit="save">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">
                    Title: <span wire:dirty.remove wire:target="form.title" class="text-red-500"> * </span>
                </label>
                <input
                    type="text"
                    id="title"
                    wire:model="form.title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('form.title') border-red-500 ring-2 ring-red-500 focus:ring-2 focus:ring-red-500 @enderror"
                />
            </div>
            @error('form.title')
                <span class="text-red-500 font-bold italic">{{ $message }}</span>
            @enderror

            <div class="mb-6">
                <label for="content" class="block text-gray-700 font-semibold mb-2">
                    Content: <span wire:dirty.remove wire:target="form.content" class="text-red-500"> * </span>
                </label>
                <textarea
                    id="content"
                    rows="4"
                    wire:model="form.content"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('form.content') border-red-500 ring-2 ring-red-500 focus:ring-2 focus:ring-red-500 @enderror"
                ></textarea>
            </div>
            @error('form.content')
                <span class="text-red-500 font-bold italic">{{ $message }}</span>
            @enderror

            <div class="mb-6">
                <label for="file" class="block text-gray-700 font-semibold mb-2">
                    Photo:
                </label>
                <div class="flex items-center">
                    <input
                        type="file"
                        id="photo"
                        wire:model="form.photo"
                        class="w-full px-4 py-2 cursor-pointer bg-transparent border border-transparent rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none @error('form.photo') border-red-500 ring-2 ring-red-500 focus:ring-2 focus:ring-red-500 @enderror"
                    />
                    @if($form->photo)
                        <img class="w-1/2 inline rounded-full" src= " {{ $form->photo->temporaryUrl() }}" >
                    @endif
                </div>
            </div>
            @error('form.photo')
                <span class="text-red-500 font-bold italic">{{ $message }}</span>
            @enderror



            <div class="mb-3">
                <label for="published" class="flex flex-row gap-3 cursor-pointer">
                    <input type="checkbox" name="published" id="published" wire:model.boolean="form.published" value="form.published"/>
                    Published
                </label>
            </div>
            <div class="mb-3">
                <div class="flex gap-4">
                    <div class="mb-2 font-semibold italic"> Notification Options: </div>
                    <div class="flex gap-6">
                        <label for="yes">
                            <input type="radio" wire:model.boolean="form.allowNotifications" id="yes" value="true">
                            Yes
                        </label>
                        <label for="no">
                            <input type="radio" wire:model.boolean="form.allowNotifications" id="no" value="false" checked>
                            No
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-3" x-show="$wire.form.allowNotifications" wire:transition.duration.500ms>
                    <label for="email">
                        <input type="checkbox" wire:model="form.notifications" id="email" value="email">
                        Email
                    </label>
                    <label for="sms">
                        <input type="checkbox" wire:model="form.notifications" id="sms" value="sms">
                        SMS
                    </label>
                    <label for="push">
                        <input type="checkbox" wire:model="form.notifications" id="push" value="push">
                        Push
                    </label>
                </div>
            </div>
            <!-- Submit Button -->
            <div class="text-center flex fex-row items-center justify-center gap-4">
                <button
                    type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-lg shadow hover:bg-indigo-700 transition duration-300 disabled:opacity-75  disabled:bg-indigo-600"
                //    disabled
                //   wire:dirty.class="hover:bg-indigo-700"
                // wire:dirty.remove.attr="disabled"
                />
                    Add
                </button>
                <a href="/dashboard/articles" class="px-6 py-2 bg-gray-500 hover:bg-gray-700 transition duration-300 text-white rounded-md" wire:navigate> Back </a>
            </div>
        </form>
    </div>
</div>
