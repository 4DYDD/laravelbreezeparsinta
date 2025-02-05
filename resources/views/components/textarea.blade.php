<textarea
    {{ $attributes->merge(['class' => 'w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}
    cols="30" rows="5">{{ $slot }}</textarea>
