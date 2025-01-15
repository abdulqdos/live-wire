@props(['admin' => false])
<div>
    <div>
        {{-- The Master doesn't talk, he acts. --}}
        <x-slot:title> Search Title </x-slot:title>
        <div>
            <form class="mb-4">
               <div class="mt-2">
                    <input
                        type="text"
                        wire:model.live="searchText"
                        class="block w-full border bg-gray-700 rounded-md p-4 text-white mb-4 focus:outline-none"
                        placeholder="{{  $placeholder }}"
                        wire:offline.attr="disabled"
                    />
               </div>

            </form>

            @if(!$admin)
                @if(!empty($searchText))
                    <div wire:transition.duration.1000ms >
                        <livewire:search-results :results="$results"/>
                    </div>
                @endif
            @else
                @if(!empty($searchText))
                    <div wire:transition.scale.origin.top.left>
                        <livewire:search-admin :results="$results" />
                    </div>
                @endif

            @endif
        </div>
    </div>

</div>
