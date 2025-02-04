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
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse, similique atque repudiandae,
                        velit nihil est illum magnam quo, blanditiis quasi sed quae itaque ex! Aspernatur quis aliquam
                        tempore dicta repellat.
                    </x-card.content>
                </div>
            </x-card>

        </div>
    </div>

</x-app-layout>
