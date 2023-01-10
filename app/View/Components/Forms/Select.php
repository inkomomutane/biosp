<?php

namespace App\View\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Input
{
    public array $options;

    public array $selected;

    public bool $multiple;

    public function __construct(bool $multiple, array $options, array $selected = [], $className = null, $name = null, $placeholder = null, $value = null, $label = null, $required = null, $type = null)
    {
        $this->selected = $selected;
        $this->options = $options;
        $this->multiple = $multiple;
        parent::__construct($className, $name, $placeholder, $value, $label, $required, $type);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|\Closure|string
    {
        return view('components.forms.select');
    }

    public function isSelected(mixed $value): bool
    {
        return in_array($value, $this->selected, true);
    }
}
