@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'mt-3 list-none text-sm text-red-600 space-y-2']) }}>
        @foreach ((array) $messages as $message)
            <li class="bg-red-200 border-l-4 border-red-500 text-red-600 font-bold p-2">{{ $message }}</li>
        @endforeach
    </ul>
@endif
