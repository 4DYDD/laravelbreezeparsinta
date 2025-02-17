@use('\App\Enums\StoreStatus')

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $store->name }} {{ __('Store') }} - {{ $store->products_count }} product
        </h2>
    </x-slot>

    @slot('title', 'Show Stores')
    {{-- @slot('stores_pending', isset($store_pending) ? $store_pending : []) --}}


    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden bg-white shadow-sm sm:rounded-lg">
                @php
                    $isAdmin = auth()->user()?->IsAdmin();
                @endphp
                <x-card class="container flex flex-col justify-between px-6 py-4 mx-auto shadow shadow-gray-400">

                    <div class="flex flex-col items-center justify-between w-full mt-2 sm:flex-row">
                        <div class="flex-[1]">
                            <div
                                class="flex justify-center m-auto mb-5 overflow-hidden border-2 border-gray-300 rounded-full size-48">
                                <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}"
                                    class="object-cover">
                            </div>
                        </div>
                        <div class="flex-[2]">
                            <x-card.title>
                                {{ $store->name }}
                            </x-card.title>

                            <x-card.description class="mt-2 text-justify">
                                {{ $store->description }}
                            </x-card.description>
                        </div>
                    </div>

                    <div class="text-sm font-semibold h-[2rem] flex justify-end items-center relative mt-2">
                        @auth
                            @if (auth()->user()->name == $store->user->name)
                                <a href="{{ route('stores.edit', $store->id) }}"
                                    class="flex px-3 py-1 text-white bg-gray-700 rounded-lg" title="Edit My Store">
                                    Edit
                                </a>
                            @endif

                            @if ($showStatus && ($isAdmin || auth()->user()->name == $store->user->name))
                                <x-badge title="{{ $store->status }}"
                                    class="ms-2">{{ $store->status === StoreStatus::ACTIVE ? '✅' : '⭕' }}</x-badge>
                            @endif

                        @endauth

                    </div>

                </x-card>

                <x-card class="container flex flex-col justify-between p-6 mx-auto mt-5 shadow shadow-gray-400">

                    <div
                        class="h-16 text-xl sm:text-2xl font-bold bg-gray-700 text-white rounded-lg shadow w-[10rem] mx-auto sm:mx-0 flex justify-center items-center mb-5">
                        Products</div>

                    @foreach ($products as $product)
                        <a href="{{ route('products.show', [$store, $product]) }}"
                            class="flex flex-col items-center justify-between w-full py-5 mb-3 bg-gray-300 rounded-lg shadow sm:items-start sm:flex-row">
                            <div class="flex-[1] flex justify-center items-center h-full">
                                <div
                                    class="flex justify-center overflow-hidden border-2 border-gray-100 rounded-full size-28 sm:size-20">
                                    <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}"
                                        class="object-cover bg-gray-100">
                                </div>
                            </div>
                            <div class="flex-[5] px-5 sm:px-0 mt-5 sm:mt-0">
                                <x-card.title class="text-lg sm:text-xl">
                                    {{ $product->name }}
                                </x-card.title>

                                <x-card.description class="mt-4 sm:mt-2 text-end sm:text-start">
                                    {{ Number::currency($product->price, 'IDR') }}
                                </x-card.description>
                            </div>
                        </a>
                    @endforeach

                </x-card>
            </div>
        </div>
    </div>

</x-app-layout>
