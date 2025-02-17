<div {{ $attributes->merge([
    'class' => 'overflow-hidden bg-white rounded-xl border border-gray-300',
]) }}>
    {{ $slot }}
</div>
