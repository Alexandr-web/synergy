<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navbarProfile extends Component
{
    public string $activeTab = "";
    public string $userId = "";

    /**
     * Create a new component instance.
     *  
     * @param string $activeTab активная вкладка
     * @param integer $userId id пользователя
     * @return void
     */
    public function __construct(string $activeTab, string $userId)
    {
        $this->activeTab = $activeTab;
        $this->userId = $userId;
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
