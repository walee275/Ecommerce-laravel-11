@props(['value', 'required' => false])

<label {{ $attributes->merge(['class' => 'block form-label']) }}>
    {{ $value ?? $slot }}
    {!! $required ? '<span class="text-danger">*</span>' : '' !!}
</label>
