<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ApiTree extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public array $menu;
    public string $tag;
    public function __construct($menu,$tag = 0)
    {
        $this->menu = $menu;
        $this->tag = $tag;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.api-tree');
    }
}
