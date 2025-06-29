<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Contact extends Component
{
    /**
     * Create a new component instance.
     */

    public $layanans;
    public $tambahans;



    public function __construct($layanans, $tambahans)
    {
        $this->layanans = $layanans;
        $this->tambahans = $tambahans;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact');
    }
}
