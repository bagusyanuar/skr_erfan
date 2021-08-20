<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarItem extends Component
{
    public $url;

    public $title;

    public $faIcon;

    public $parentId;

    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $url
     * @param string $faIcon
     * @param string $parentId
     */
    public function __construct($title, $url, $faIcon = 'fa fa-circle-thin', $parentId = '')
    {
        //
        $this->url = $url;
        $this->title = $title;
        $this->faIcon = $faIcon;
        $this->parentId = $parentId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.sidebar-item');
    }
}
