<nav {{ $attributes->merge(['class' => 'navbar  navbar-expand-lg navbar-light bg-light']) }}>
    <a class="navbar-brand" href="/">
        {{ $brand }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            @foreach($links as $link)
                <li class="nav-item">
                    <a class="nav-link f14 ml-3" href="{{ $link['url'] }}">{{ $link['title'] }}</a>
                </li>
            @endforeach
            @isset($addonmenu)
                {{ $addonmenu }}
            @endisset
        </ul>
    </div>
</nav>
