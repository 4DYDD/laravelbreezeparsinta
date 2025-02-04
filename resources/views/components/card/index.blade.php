<div
    {{ $attributes->merge([
        'class' => 'overflow-hidden bg-white sm:rounded-lg border border-zinc-300',
    ]) }}>
    {{ $slot }}
</div>
