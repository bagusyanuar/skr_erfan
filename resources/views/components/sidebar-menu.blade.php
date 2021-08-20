<li class="nav-item">
    <a href="{{ $url }}" class="nav-link {{ $url === '/'.\Illuminate\Support\Facades\Request::path() ? 'active' : '' }}">
        <i class="{{ $faIcon }} nav-icon" aria-hidden="true"></i>
        <p>{{ $title }}</p>
    </a>
</li>
