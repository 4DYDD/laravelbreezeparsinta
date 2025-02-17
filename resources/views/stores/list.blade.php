@use('App\Enums\StoreStatus')

<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List Stores') }}
        </h2>
    </x-slot>

    @slot('title', 'List Stores')

    <x-container>
        <div class="mb-8">
            {{ $stores->links() }}
        </div>

        <div class="grid grid-cols-3 gap-6">


            @foreach ($stores as $store)
                <x-card>

                    <x-card.header>
                        <x-card.title>
                            {{ $store->name }}
                        </x-card.title>
                        <span class="text-xs">
                            Created at {{ $store->created_at->format('d F Y') }}
                            <br>
                            by {{ $store->user->name }}
                        </span>
                    </x-card.header>

                    <x-card.content class="flex flex-col justify-between mt-2 h-52">
                        <x-card.description class="px-6 text-justify">
                            <span class="px-3"></span>
                            {{ Str::limit($store->description, 130, '...') }}
                            <p class="mt-2 text-sm text-gray-400">{{ $store->products_count }}
                                {{ str('product')->plural($store->products_count) }}</p>
                        </x-card.description>

                        <div class="flex justify-end p-3 space-y-6">

                            @if ($store->status === StoreStatus::PENDING)
                                <x-primary-button x-data=""
                                    x-on:click.prevent="$dispatch('open-modal', 'approve-store-{{ $store->id }}')">
                                    {{ __('Approve Store') }}
                                </x-primary-button>

                                {{-- MODAL --}}
                                <x-modal name="approve-store-{{ $store->id }}" :show="$errors->userDeletion->isNotEmpty()" focusable>
                                    <form method="post" action="{{ route('stores.approve', $store) }}" class="p-6">
                                        @csrf
                                        @method('PUT')

                                        <h2 class="text-lg font-medium text-gray-900">
                                            <x-card.title>
                                                {{ $store->name }}
                                            </x-card.title>
                                            <x-card.description class="px-6 mt-2 text-justify">
                                                <span class="px-3"></span>
                                                {{ $store->description }}
                                            </x-card.description>
                                        </h2>

                                        <div class="flex justify-end mt-6">
                                            <x-secondary-button x-on:click="$dispatch('close')">
                                                {{ __('Cancel') }}
                                            </x-secondary-button>

                                            <x-primary-button class="ms-3">
                                                {{ __('Approve') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </x-modal>
                                {{-- MODAL --}}
                            @else
                                <div
                                    class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-green-700 border border-green-700 rounded-md shadow shadow-green-500">
                                    {{ __('Approved') }}
                                </div>
                            @endif

                        </div>

                    </x-card.content>

                </x-card>
            @endforeach

        </div>
    </x-container>

</x-app-layout>
