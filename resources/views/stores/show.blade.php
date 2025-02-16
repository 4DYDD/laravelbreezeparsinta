<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $store->user->name }} {{ __('Store') }} - {{ $store->products_count }} product
        </h2>
    </x-slot>

    @slot('title', 'Show Stores')
    {{-- @slot('stores_pending', isset($store_pending) ? $store_pending : []) --}}


    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                @php
                    $isAdmin = auth()->user()->IsAdmin();
                @endphp
                <x-card class="container flex flex-col justify-between p-6 mx-auto shadow shadow-gray-400">

                    <div class="flex items-center justify-between w-full">
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

                    <div class="text-sm font-semibold mt-2 h-[0.6rem] flex justify-end items-center relative">
                        @auth
                            @if (auth()->user()->name == $store->user->name)
                                <a href="{{ route('stores.edit', $store->id) }}"
                                    class="flex px-3 py-1 bg-gray-700 text-white rounded-lg absolute {{ !request()->routeIs('stores.mine') ? 'right-[2rem]' : '-right-3' }}  -top-1.5"
                                    title="Edit My Store">
                                    Edit
                                </a>
                            @endif

                            @if ($showStatus && ($isAdmin || auth()->user()->name == $store->user->name))
                                <x-badge class="!left-[92%]">{{ $store->status }}</x-badge>
                            @endif

                        @endauth

                    </div>

                </x-card>

                <x-card class="container flex flex-col justify-between p-6 mx-auto mt-5 shadow shadow-gray-400">

                    <div
                        class="h-16 text-2xl font-bold bg-gray-800 text-white rounded-lg shadow w-[10rem] flex justify-center items-center mb-5">
                        Products</div>

                    @foreach ($store->products as $product)
                        <div class="flex items-start justify-between w-full py-5 mb-3 bg-gray-300 rounded-lg shadow">
                            <div class="flex-[1] flex justify-center items-center h-full">
                                <div
                                    class="flex justify-center overflow-hidden border-2 border-gray-300 rounded-full size-12">
                                    <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}"
                                        class="object-cover">
                                </div>
                            </div>
                            <div class="flex-[5]">
                                <x-card.title>
                                    {{ $product->name }}
                                </x-card.title>

                                <x-card.description class="mt-2 text-justify">
                                    {{ Number::currency($product->price, 'IDR') }}
                                </x-card.description>
                            </div>
                        </div>
                    @endforeach

                </x-card>
            </div>
        </div>
    </div>

</x-app-layout>
