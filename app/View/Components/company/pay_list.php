<?php

namespace App\View\Components\company;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class pay_list extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(private int $id,private string $type,private string $date,private float $amount,private string $copy)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.company.pay_list');
    }
}
