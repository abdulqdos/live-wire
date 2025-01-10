@props(['admin' => false])
<div>
    <div>
        {{-- The Master doesn't talk, he acts. --}}
        <x-slot:title> Search Title </x-slot:title>
        <div>
            <form class="mb-4">
               <div class="mt-2">
                    <input type="text" wire:model.live="searchText" class="block w-full border bg-gray-700 rounded-md p-4 text-white mb-4 focus:outline-none" placeholder="{{  $placeholder }}" />
               </div>

            </form>

            @if(!$admin)
                <livewire:search-results :results="$results" :show="!empty($searchText)"/>
            @else
                <livewire:search-admin :results="$results" :show="!empty($searchText)"/>
            @endif
        </div>
    </div>

</div>
