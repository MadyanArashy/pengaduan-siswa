<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AppLayout extends Component
{
    public $role;

    public function render()
    {
        return view('layouts.app');
    }
}
