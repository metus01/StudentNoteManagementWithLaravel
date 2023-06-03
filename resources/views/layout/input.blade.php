@php
    $name ??= '';
    $type ??= 'text';
    $label ??= Str::ucfirst($name);
    $class ??= '';
    $value ??= null;
@endphp
<div @class(['mb-3', $class])>
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    @if ($type === 'textarea')
        <textarea name="{{ $name }}" id="" cols="30" rows="10"
            class="form-control @error($name) is-invalid @enderror"> {{ $value }}</textarea>
    @else
        <input type="{{ $type }}" class="form-control @error($name) is-invalid @enderror"
            value="{{ old($name, $value) }}" name="{{ $name }}">
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
