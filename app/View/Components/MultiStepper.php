<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MultiStepper extends Component
{
    public $step;
    public $cv;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($step, $cv)
    {
        $this->step = $step;
        $this->cv = $cv;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.multi-stepper');
    }
}
