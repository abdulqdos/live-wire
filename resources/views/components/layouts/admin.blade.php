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
                            <x-layouts.nav href="/dashboard" wire:navigate :active="request()->is('dashboard')"> Dashboard </x-layouts.nav>
                        </li>
                        <li>
                            <x-layouts.nav href="/dashboard/articles" wire:navigate :active="request()->is('dashboard/articles')"> Articles </x-layouts.nav>
                        </li>

                    </ul>

                    <!-- Search Component -->
{{--                    @dd($admin)--}}
                    <livewire:search placeholder="Search for anything" :admin="$admin" />
                </div>
            </nav>

            <main class="mt-6 bg-white shadow-lg rounded-lg p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
</body>
</html>
