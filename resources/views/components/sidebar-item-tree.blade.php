<li {{ $attributes->merge(['class' => 'nav-item has-treeview', 'data-widget' => 'treeview', 'role' => 'menu', 'data-accordion' => 'false']) }}>
    <a href="#" class="nav-link tree-item">
        <i class="nav-icon {{ $faIcon }}" aria-hidden="true"></i>
        <p>
            {{ $title }}
            <i class="right fa fa-angle-down"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        {{ $slot }}
    </ul>
</li>
