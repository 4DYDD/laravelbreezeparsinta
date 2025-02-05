<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create new Store') }}
        </h2>
    </x-slot>

    @slot('title', 'Create new Store')

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <x-card class="sm:max-w-2xl">

                <div class="p-6 text-gray-900">
                    <x-card.title>
                        {{ __('Ini adalah halaman Stores') }}
                    </x-card.title>
                    <x-card.description>
                        {{ __('Kamu dapat membuat hingga 5 store baru!') }}
                    </x-card.description>
                    <x-card.content>
                        <form action="{{ route('stores.store') }}" method="post" enctype="multipart/form-data" novalidate
                            class="[&>div]:mb-6 mt-6">
                            @csrf
                            <div>
                                <x-input-label for="logo" :value="__('Logo')" class="sr-only" />
                                <input id="logo" name="logo" type="file" />
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea id="description" type="text" name="description" :value="old('description')"
                                    required autofocus>
                                </x-textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>
                            <x-primary-button>Create</x-primary-button>
                        </form>
                    </x-card.content>
                </div>
            </x-card>

        </div>
    </div>

</x-app-layout>
