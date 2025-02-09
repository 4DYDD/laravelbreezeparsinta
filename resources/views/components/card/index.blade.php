<div {{ $attributes->merge([
    'class' => 'overflow-hidden bg-white sm:rounded-xl border border-gray-300',
]) }}>
    {{ $slot }}
</div>
