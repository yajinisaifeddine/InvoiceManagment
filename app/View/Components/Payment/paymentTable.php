<?php

namespace App\View\Components\Payment;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class paymentTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        private $payments,
        private $company,
        private $total
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.payment.payment-table', [
            'company' => $this->company,
            'payments' => $this->payments,
            'total' => $this->total
        ]);
    }
}
