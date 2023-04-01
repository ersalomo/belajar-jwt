<?php

namespace App\View\Components\Back;

use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public string $pageTitle;
    public function __construct(string $pageTitle = 'Management Visitor')
    {
        $this->pageTitle = $pageTitle;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('back.layouts.app-layouts');
    }
}
