<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Header extends Component
{
    public string $activePage = "";

    /**
     * Create a new component instance.
     *
     * @param string $active активный путь
     * @return void
     */
    public function __construct(string $activePage)
    {
        $this->activePage = $activePage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
