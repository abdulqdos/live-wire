<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div>
        <form wire:submit="changeGreeting()">
            <select wire:model.fill="greeting" type="text" class="p-4 border rounded-md bg-gray-700 text-white mb-4">
                @foreach($greetings as $item)
                    <option value="{{ $item->greeting }}"> {{ $item->greeting }}</option>
                @endforeach
            </select>
            <input type="text" wire:model.live="name" class="block w-full border bg-gray-700 rounded-md p-4 text-white mb-4 @error('name') border-red-600 @enderror focus:outline-none" />
            @error('name')
                <span class="text-red-600 font-bold italic"> {{ $message }}</span>
            @enderror
            <br><br>
            <button class="text-white font-medium rounded-md px-4 py-2 bg-blue-500" type="submit"> Change Name</button>

        </form>

        <div>
            @if($greetingMessage !== '')
                <h1 class="text-2xl mt-4 text-white font-bold"> {{ $greetingMessage }}</h1>
            @endif
        </div>
    </div>
</div>


