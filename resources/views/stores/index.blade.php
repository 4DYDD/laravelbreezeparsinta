<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Stores') }}
        </h2>
    </x-slot>

    @slot('title', 'Stores')
    @slot('stores_pending', isset($store_pending) ? $store_pending : [])


    <div class="py-6">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-1 gap-6 p-3 md:grid-cols-3">
                    @foreach ($stores as $store)
                        <x-card class="flex flex-col justify-between p-6 mx-5 shadow md:mx-0 shadow-gray-400">

                            <div>
                                <div
                                    class="flex justify-center m-auto mb-5 overflow-hidden border-2 border-gray-300 rounded-full size-24">
                                    <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}"
                                        class="object-cover">
                                </div>

                                <x-card.title>
                                    {{ $store->name }}
                                </x-card.title>

                                <x-card.description class="mt-2 text-justify">
                                    <span class="px-3"></span>
                                    {{ Str::limit($store->description, 130, '...') }}
                                </x-card.description>
                            </div>

                            <div class="text-sm font-semibold mt-2 h-[0.6rem] flex justify-start items-center relative">
                                @auth
                                    @if (auth()->user()->name == $store->user->name)
                                        <a href="{{ route('stores.edit', $store->id) }}"
                                            class=" flex px-3 py-1 bg-gray-700 text-white rounded-lg absolute right-[2rem] -top-1.5"
                                            title="Edit My Store">
                                            Edit
                                        </a>
                                        <span
                                            class="px-2 py-1 bg-gray-700 text-white rounded-lg absolute -right-3 -top-1.5 cursor-pointer"
                                            title="My Store">
                                            ⭐
                                        </span>
                                    @endif
                                    {{-- @dd(auth()->user()->isAdmin()) --}}
                                    @if (auth()->user()->IsAdmin())
                                        <span
                                            class="absolute px-2 py-1 text-xs text-white bg-gray-700 rounded-lg cursor-pointer -left-3 -top-0.5"
                                            title="My Store">
                                            {{ $store->user->name }} Store
                                        </span>
                                    @endif
                                @endauth


                            </div>

                        </x-card>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
