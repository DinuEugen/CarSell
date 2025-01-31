<?php

namespace App\View\Components;

use Closure;
use App\Models\Maker;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection;


class SelectMaker extends Component
{
public Collection  $makers;


    public function __construct()
    {
        $this->makers=Maker::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select-maker');
    }
}
