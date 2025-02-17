<span
    {{ $attributes->merge([
        'class' => 'px-2 py-1 bg-gray-700 text-white rounded-lg capitalize cursor-pointer',
    ]) }}>
    {{ $slot }}
</span>
