<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InvoiceLines extends Component
{
    public array $lines;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($lines = [])
    {
        $this->lines = $lines;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.invoice-lines');
    }
}
