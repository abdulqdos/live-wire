@props(['type' => false , 'active' => false])
@if($type == 'button')
    <button {{ $attributes }} class='transition duration-300 hover:text-blue-600 {{ $active ? 'text-blue-600' : '' }}' wire:navigate> {{ $slot }}</button>
@else
    <a {{ $attributes }} class='hover:text-gray-300 font-medium transition duration-300 cursor-pointer {{ $active ? 'text-gray-400' : 'text-white' }}' wire:navigate> {{ $slot }}</a>
@endif


