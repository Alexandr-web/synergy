<?php

namespace App\View\Components;

use Illuminate\View\Component;

class profileInfoTab extends Component
{
    public $user = [];
    /**
     * Create a new component instance.
     *
     * @param $user данные пользователя
     * @return void
     */
    public function __construct(object $user)
    {
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.profile-info-tab');
    }
}
