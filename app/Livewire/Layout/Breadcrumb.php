<?php

namespace App\Livewire\Layout;

use App\Livewire\Closure;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Breadcrumb extends Component
{
    public function render(): View|Closure|string
    {
        $request = explode('/',request()->path());

        return view('livewire.layout.breadcrumb', compact('request'));

    }
}
