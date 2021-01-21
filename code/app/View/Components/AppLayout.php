<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $title, $line;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = '', $line = '')
    {
        $this->title = $title;
        $this->line  = $line;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layout');
    }
}
