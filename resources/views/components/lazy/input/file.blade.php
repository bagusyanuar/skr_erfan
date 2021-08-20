<div class="form-group">
    <label for="{{$id}}">{{$label}}</label>
    <input
        {{ $attributes->merge([
    'type' => 'file',
    'class' => 'form-control-file',
    'id' => $id,
    'name' => $name,
    ]) }}
        >
</div>
