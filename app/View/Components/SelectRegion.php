<?php

namespace App\View\Components;

use Closure;
use App\Models\Region;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

class SelectRegion extends Component
{
    public Collection $regions;

    public function __construct()
    {
      $this->regions=Region::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-region');
    }
}
