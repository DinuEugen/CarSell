<?php

namespace App\View\Components;

use Closure;
use App\Models\FuelType;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class RadioListFuelType extends Component
{
    public Collection $fuelTypes;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->fuelTypes=FuelType::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.radio-list-fuel-type');
    }
}
