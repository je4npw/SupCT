<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Breadcrumb extends Component
{
    public function render(): View|Closure|string
    {
        $request = explode('/',request()->path());

        return view('livewire.breadcrumb', compact('request'));

    }
}
