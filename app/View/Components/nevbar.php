<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class nevbar extends Component
{
    public $name;
    /**
     * Create a new component instance.
     */
    public function __construct($name=null)
    {
        //
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nevbar');
    }
}
