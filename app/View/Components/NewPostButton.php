<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewPostButton extends Component
{
    /**
     * Create a new component instance.
     */

    // public $test;

    public function __construct(/*$posts*/)
    {
        // $this->test = $posts;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('my-components.new-post-button');
    }
}
