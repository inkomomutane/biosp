<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{

    public string $trigger;
    public string|null $title;
    public string|null $body;
    public string|null $buttons;

    /**
     * @param string $trigger
     * @param string|null $title
     * @param string|null $body
     * @param string|null $buttons
     */
    public function __construct(string $trigger ,
                                ?string $title = null,
                                ?string $body = null,
                                ?string $buttons= null
    )
    {
        $this->trigger = $trigger;
        $this->title = $title;
        $this->body = $body;
        $this->buttons = $buttons;
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render():View|Closure|string
    {
        return view('components.modal');
    }
}
