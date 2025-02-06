<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $header }}
        </h2>
    </x-slot>

    @slot('title', $header)

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <x-card class="sm:max-w-2xl">

                <div class="p-6 text-gray-900">
                    <x-card.title>
                        {{ $card_title }}
                    </x-card.title>
                    <x-card.description>
                        {{ $card_description }}
                    </x-card.description>
                    <x-card.content>
                        <form action="{{ $form_route }}" method="post" enctype="multipart/form-data" novalidate
                            class="[&>div]:mb-6 mt-6" id="myForm">
                            @csrf
                            @method($form_method)
                            <div>
                                <x-input-label for="logo" :value="__('Logo')" class="sr-only" />
                                <input id="logo" name="logo" type="file" />
                                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                                    :value="old('name', $store->name ?? '')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-textarea id="description" type="text" name="description" required autofocus>
                                    {{ old('description', $store->description ?? '') }}
                                </x-textarea>
                                @error('description')
                                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                                @else
                                    <span id="error-description" class="space-y-1 text-sm text-red-600"></span>
                                @enderror
                            </div>
                            <x-primary-button>{{ $button_text }}</x-primary-button>
                        </form>
                    </x-card.content>
                </div>
            </x-card>

        </div>
    </div>

</x-app-layout>
