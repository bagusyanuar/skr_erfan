<?php

namespace App\View\Components\Lazy\Input;

use Illuminate\View\Component;

class File extends Component
{
    public $id;
    public $name;
    public $label;

    /**
     * File constructor.
     * @param $id
     * @param $name
     * @param $label
     */
    public function __construct($id, $name, $label = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.lazy.input.file');
    }
}
