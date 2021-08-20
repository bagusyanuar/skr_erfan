<?php

namespace App\View\Components\Lazy\Form;

use Illuminate\View\Component;

class FormFile extends Component
{
    public $action;

    public $type;

    public $id;

    /**
     * Create a new component instance.
     *
     * @param $action
     * @param string $type
     * @param string $id
     */
    public function __construct($action, $type = 'new', $id = '')
    {
        //
        $this->action = $action;
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.lazy.form.form-file');
    }
}
