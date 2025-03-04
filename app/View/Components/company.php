<?php
namespace App\View\Components;

use Closure;
use App\Models\Invoice;
use App\Models\Payment;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Company extends Component
{


    /**
     * Create a new component instance.
     */
    public function __construct(
    public $id,
    public $logo,
    public $name,
    public $director,
     public $payments,
    public $invoices,
) {
    // Only calculate paid and rest if they are not provided

}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.company'); // No need for compact()
    }
}
