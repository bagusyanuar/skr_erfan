<Form method="post" action="{{ $action }}">
    @csrf
    @if($type === 'edit')
        <input type="hidden" name="id" value="{{ $id }}">
    @endif
    {{ $slot }}
</Form>
