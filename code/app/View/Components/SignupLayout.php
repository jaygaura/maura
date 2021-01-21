<?php

namespace App\View\Components;

use App\Traits\MainUtility;
use Illuminate\View\Component;

class SignupLayout extends Component
{
    use MainUtility;

    public $title;
    public $locales;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '')
    {
        $this->title   = $title;
        $this->locales = $this->getLocales();
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.signup');
    }
}
