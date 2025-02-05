<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    @slot('title', 'Stores')

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-3 gap-6">
                    @foreach ($stores as $store)
                        <x-card class="p-6">
                            <img src="{{ \Illuminate\Support\Facades\Storage::url($store->logo) }}"
                                alt="{{ $store->name }}"
                                class="size-24 shadow border border-gray-300 shadow-gray-400 rounded-full m-auto mb-6">
                            <x-card.title>{{ $store->name }}</x-card.title>
                            <x-card.description class="text-justify mt-2"><span class="px-3"></span>
                                {{ $store->description }}</x-card.description>
                        </x-card>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
