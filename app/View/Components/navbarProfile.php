<?php

namespace App\View\Components;

use Illuminate\View\Component;

class navbarProfile extends Component
{
    public string $activeTab = "";
    public string $userId = "";
    public bool $isGuest = true;

    /**
     * Create a new component instance.
     *  
     * @param string $activeTab активная вкладка
     * @param string $userId id пользователя
     * @param bool $isGuest пользователь является гостем
     * @return void
     */
    public function __construct(string $activeTab, string $userId, bool $isGuest)
    {
        $this->activeTab = $activeTab;
        $this->userId = $userId;
        $this->isGuest = $isGuest;
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
