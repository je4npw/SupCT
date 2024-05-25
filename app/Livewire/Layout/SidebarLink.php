<?php

namespace App\Livewire\Layout;

use App\Livewire\Closure;
use App\Models\MenuItem;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class SidebarLink extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('livewire.layout.sidebar-link')->with([
            'menuItems' => $this->getLinks()
        ]);
    }
    public function getLinks()
    {
        return MenuItem::all()->map(function ($item) {
            return [
                'item_name' => $item->item_name,
                'item_link' => $item->item_link,
                'fa_icon' => $item->fa_icon,
            ];
        });
    }
}
