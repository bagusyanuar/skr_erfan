<?php

namespace App\View\Components;

use Illuminate\View\Component;

class PacketNavbar extends Component
{
    public $links = [];
    /**
     * Create a new component instance.
     * @param $links
     * @return void
     */
    public function __construct($links)
    {
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.packet-navbar');
    }
}
