<?php

namespace App\View\Components\company;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class inv_list extends Component
{
    /**
     * Create a new component instance.
     */
        public function __construct(private int $id,private string $number,private string $date,private float $amount,private string $copy)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.company.inv_list');
    }
}
