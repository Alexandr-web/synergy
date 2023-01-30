<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navbarProfile extends Component
{
    public $activeTab = "";

    /**
     * Create a new component instance.
     *  
     * @param string $activeTab активная вкладка
     * @return void
     */
    public function __construct(string $activeTab)
    {
        $this->activeTab = $activeTab;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar-profile');
    }
}
