<li class="nav-item">
    <a href="{{ $url }}"
       class="nav-link {{ $url === '/'.\Illuminate\Support\Facades\Request::path() ? 'active' : '' }}">
        <i class="{{ $faIcon }} nav-icon" aria-hidden="true"></i>
        <p>{{ $title }}</p>
    </a>
</li>

@if($url === '/'.\Illuminate\Support\Facades\Request::path() && $parentId !== '')
    @push('addOn')
        <script>
            let parentId = '{{ $parentId }}';
            let id = document.getElementById('{{ $parentId }}');
            id.classList.toggle('menu-open');
            // alert('#'+id)
            let treeItem = document.querySelector(`#${parentId} a.tree-item`);
            treeItem.classList.toggle('active');
        </script>
    @endpush
@endif
