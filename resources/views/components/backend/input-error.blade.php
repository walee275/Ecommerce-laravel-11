@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm list-unstyled mt-2 ']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
