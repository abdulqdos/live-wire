<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body class="font-sans antialiased bg-white text-gray-700 min-h-screen h-full" x-data x-on:click="$dispatch('search:clear')">
<div class="bg-white text-gray-700">
    <div class="relative flex flex-col items-center justify-center selection:bg-indigo-600 selection:text-white">
        <div class="relative w-full">
            <nav class="bg-gray-800 shadow-md px-3">
                <div class=" flex flex-row items-center justify-between p-4">
                    <!-- Logo or Navigation Links -->
                    <ul class="flex space-x-4">
                        <li>
                            <x-layouts.nav href="/" wire:navigate :active="request()->is('/')"> HOME </x-layouts.nav>
                        </li>

                        <li>
                            @auth
                                <a href="{{ route('logout') }}" class = "text-white hover:text-gray-300 font-medium transition duration-300 cursor-pointer">
                                    Logout
                                </a>
                            @endauth
                            @guest
                                <div class="flex flex-row gap-6">
                                    <x-layouts.nav href="/login" wire:navigate :active="request()->is('login')"> Login </x-layouts.nav>
                                    <x-layouts.nav href="/signup" wire:navigate :active="request()->is('signup')"> Signup </x-layouts.nav>
                                </div>

                            @endguest
                        </li>
                    </ul>

                    <!-- Search Component -->
                    <livewire:search placeholder="Search for anything" />
                </div>
            </nav>

            <main class="mt-6 bg-white shadow-lg rounded-lg p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
</body>
<script>
    console.log('Page loaded');
</script>
</html>
