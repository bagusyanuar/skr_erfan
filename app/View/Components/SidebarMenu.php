<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarMenu extends Component
{
    public $url;

    public $title;

    public $faIcon;

    /**
     * Create a new component instance.
     * @param $title
     * @param $url
     * @param string $faIcon
     */
    public function __construct($title, $url, $faIcon = 'fa fa-circle-thin')
    {
        //
        $this->url = $url;
        $this->title = $title;
        $this->faIcon = $faIcon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar-menu');
    }
}
