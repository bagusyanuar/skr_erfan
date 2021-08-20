<div class="form-group">
    <label for="{{ $id }}">{{$label}}</label>
    <select
        {{ $attributes->merge([
    'class' => 'custom-select',
    'id' => $id,
    'name' => $name,
    ]) }}
    >
    {{ $slot }}

    </select>
</div>
