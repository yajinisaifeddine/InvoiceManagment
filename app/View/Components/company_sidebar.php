<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class company_sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private $id)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.company_sidebar');
    }
}
