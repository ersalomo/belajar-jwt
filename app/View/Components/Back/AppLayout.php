<?php

namespace App\View\Components\Back;

use Closure;
use Illuminate\Contracts\View\View;
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
     * @return View|Closure|string
     */
    public function render()
    {
        return view('back.layouts.app-layouts');
    }
}
