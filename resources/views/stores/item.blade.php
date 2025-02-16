@props([
    'store' => [],
    'showStatus' => false,
    'isAdmin' => false,
])

<x-card
    class="flex flex-col justify-between p-6 mx-5 scale-100 shadow md:mx-0 shadow-gray-400 transall hover:scale-[0.98]">

    <a href="{{ route('stores.show', $store) }}">
        <div class="flex justify-center m-auto mb-5 overflow-hidden border-2 border-gray-300 rounded-full size-24">
            <img src="{{ Storage::url($store->logo) }}" alt="{{ $store->name }}" class="object-cover">
        </div>

        <x-card.title>
            {{ $store->name }}
        </x-card.title>

        <x-card.description class="mt-2 text-justify">
            <span class="px-3"></span>
            {{ Str::limit($store->description, 130, '...') }}
        </x-card.description>
    </a>

    <div class="text-sm font-semibold mt-2 h-[0.6rem] flex justify-start items-center relative">
        @auth
            @if (auth()->user()->name == $store->user->name)
                <a href="{{ route('stores.edit', $store->id) }}"
                    class="flex px-3 py-1 bg-gray-700 text-white rounded-lg absolute {{ !request()->routeIs('stores.mine') ? 'right-[2rem]' : '-right-3' }}  -top-1.5"
                    title="Edit My Store">
                    Edit
                </a>
                @if (!request()->routeIs('stores.mine'))
                    <span class="px-2 py-1 bg-gray-700 text-white rounded-lg absolute -right-3 -top-1.5 cursor-pointer"
                        title="My Store">
                        ⭐
                    </span>
                @endif
            @endif

            @if ($showStatus)
                <x-badge>{{ $store->status }}</x-badge>
            @endif

            @if ($isAdmin)
                <span class="absolute px-2 py-1 text-xs text-white bg-gray-700 rounded-lg cursor-default -left-3 -top-0.5">
                    {{ $store->user->name }} Store
                </span>
            @endif
        @endauth

    </div>

</x-card>
