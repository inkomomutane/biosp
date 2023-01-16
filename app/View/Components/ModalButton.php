<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalButton extends Component
{

    public string|null $title;
    public bool $dismiss;
    public string|null $className;
    public string|null $type;

    /**
     * @param string|null $title
     * @param string|null $type
     * @param bool $dismiss
     * @param string|null $className
     */
    public function __construct(?string $title = '', ?string $type = 'button',  bool $dismiss = false, ?string $className = '')
    {
        $this->title = $title;
        $this->dismiss = $dismiss;
        $this->className = $className;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-button');
    }
}
