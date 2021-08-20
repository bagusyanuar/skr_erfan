<aside {{ $attributes->merge(['class' => 'main-sidebar sidebar-dark-primary elevation-4 my-sidebar']) }}>
    <div class="sidebar my-content-sidebar">
        @if(isset($brand))
            <div class="brand-link my-text-light d-flex justify-content-center align-items-center mb-3">
                {{  $brand }}
            </div>
        @endif
        {{ isset($profiles) ? $profiles : ''}}
        @if(isset($menu))
            <div class="my-sidebar-menu">
                <ul class="nav nav-sidebar nav-pills flex-column">
                    {{ $menu }}
                </ul>
            </div>
        @endif
        {{ isset($footer) ? $footer : ''}}
    </div>
</aside>
