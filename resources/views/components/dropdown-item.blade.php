@props(['value', 'label', 'selected'])
<option value="{{ $value }}"
    @if($selected) selected disabled @endif>
    {{ $label }}
</option>
