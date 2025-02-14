<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Stores') }}
        </h2>
    </x-slot>

    @slot('title', 'My Stores')

    <x-container>
        @if ($stores->count())
            <div class="grid grid-cols-1 gap-6 p-3 md:grid-cols-3">
                @foreach ($stores as $store)
                    <x-stores-item :$store :$showStatus />
                @endforeach
            </div>
        @else
            <p class="text-gray-400">
                tidak ada toko!
            </p>
        @endif

    </x-container>

</x-app-layout>
