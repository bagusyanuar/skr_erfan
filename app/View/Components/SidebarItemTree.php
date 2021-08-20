<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SidebarItemTree extends Component
{
    public $title;

    public $faIcon;


    /**
     * Create a new component instance.
     *
     * @param $title
     * @param string $faIcon
     */
    public function __construct($title, $faIcon = 'fa fa-circle-thin')
    {
        //
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
        return view('components.sidebar-item-tree');
    }
}
