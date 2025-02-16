<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    @slot('title', 'Stores')
    {{-- @slot('stores_pending', $store_pending ?? []) --}}


    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-6 p-3 md:grid-cols-3">
                    @php
                        $isAdmin = auth()->user()?->IsAdmin();
                    @endphp
                    @foreach ($stores as $store)
                        <x-stores-item :$store :$showStatus :$isAdmin />
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
