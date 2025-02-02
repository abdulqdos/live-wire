<div>
    <div class="flex flex-col gap-4 absolute border rounded-md bg-white shadow-lg border-gray-300 p-4 max-w-80">
        <!-- Close Button -->
        <div class="absolute top-0 right-0 pr-4 pt-1">
            <button type="button" class="hover:text-red-500 transition duration-300" wire:click="dispatch('search:clear')">x</button>
        </div>

        <!-- Results -->
        @if(count($results) == 0)
            <p class="text-gray-500 mr-10">No Results Found</p>
        @else
            @foreach($results as $result)
                <div class="pt-2" wire:key="{{ $result->id }}">
                    <a href="/dashboard/article/{{$result->id}}"
                       class="text-gray-700 hover:underline hover:text-indigo-500 transition duration-300"
                       wire:navigate.hover
                       wire:key="{{$result->id}}"
                    >
                        {{ $result->title }}
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</div>
