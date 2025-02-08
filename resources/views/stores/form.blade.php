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
                                @if ($store->logo)
                                    <img src="{{ \Illuminate\Support\Facades\Storage::url($store->logo) }}"
                                        alt="{{ $store->name }}"
                                        class="m-auto mb-5 border border-gray-300 rounded-full shadow size-24 shadow-gray-400">
                                @else
                                    <div
                                        class="flex items-center justify-center m-auto mb-5 bg-center border border-gray-300 rounded-full shadow size-24 shadow-gray-400">
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url('images/stores/store.png') }}"
                                            alt="{{ $store->name }}" class="size-16">
                                    </div>
                                @endif


                                <div class="block mb-2 text-lg font-medium text-center text-gray-700">
                                    Upload {{ $store->logo ? 'new' : '' }} Logo
                                </div>

                                <div class="flex items-center justify-center w-full">
                                    <label for="dropzone-file" x-data="{ fileName: 'Pilih Logo' }"
                                        class="flex flex-col items-center justify-center w-full h-64 bg-gray-200 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer transall"
                                        @dragover.prevent="$el.classList.add('bg-gray-300', 'border-gray-400')"
                                        @dragleave.prevent="$el.classList.remove('bg-gray-300', 'border-gray-400')"
                                        @drop.prevent="handleDrop($event)">

                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-400" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <span x-show="fileName === 'Pilih Logo'" class="mb-2 text-sm text-gray-400">
                                                <span class="font-semibold">Click to upload</span> or drag and drop
                                                <br>
                                                <p class="text-xs text-center text-gray-400">SVG,
                                                    PNG, JPG or GIF</p>
                                            </span>
                                            <span x-show="fileName !== 'Pilih Logo'" class="mb-2 text-lg text-gray-400"
                                                x-text="fileName">
                                            </span>

                                        </div>
                                        <input id="dropzone-file" name="logo" type="file" class="hidden"
                                            x-ref="fileInput"
                                            @change="fileName = $refs.fileInput.files.length > 0 ? $refs.fileInput.files[0].name : 'Pilih Logo'" />
                                    </label>
                                </div>


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
