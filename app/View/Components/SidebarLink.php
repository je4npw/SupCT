<?php

namespace App\View\Components;

use App\Models\MenuItem;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarLink extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(

    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menuItems = MenuItem::all()->map(function ($item) {
            return [
                'item_name' => $item->item_name,
                'item_link' => $item->item_link,
                'fa_icon' => $item->fa_icon,
            ];
        });

        return view('components.sidebar-link', compact('menuItems'));
    }
}
