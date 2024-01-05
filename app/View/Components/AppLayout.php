<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{


    public function __construct(
        public string $dir = 'ltr',
        public string $lang = 'en',
        public string $color = 'red',
        )
    {}

    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('layouts.app');
    }
}
