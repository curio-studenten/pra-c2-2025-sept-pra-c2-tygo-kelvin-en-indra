<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Greeting extends Component
{
    public $name;

    public function __construct($name = null)
    {
        $this->name = $name ?? 'Ty';
    }

    public function render()
    {
        return view('components.greeting');
    }
}
