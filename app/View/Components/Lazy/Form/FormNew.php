<?php

namespace App\View\Components\Lazy\Form;

use Illuminate\View\Component;

class FormNew extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.lazy.form.form-new');
    }
}
