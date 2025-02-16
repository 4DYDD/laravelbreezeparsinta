<span
    {{ $attributes->merge([
        'class' => 'uppercase px-2 py-1 bg-gray-700 text-white rounded-lg absolute -left-3 -top-1.5',
    ]) }}>
    {{ $slot }}
</span>
