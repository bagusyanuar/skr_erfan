<Form method="post" action="{{ $action }}" enctype="multipart/form-data">
    @csrf
    @if($type === 'edit')
        <input type="hidden" name="id" value="{{ $id }}">
    @endif
    {{ $slot }}
</Form>
