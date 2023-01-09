<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{

    public string $name;
    public string $type;
    public string $placeholder;
    public string $value;
    public string $label;
    public bool $required;
    public string|null $className;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($className = null, $name = null,$placeholder = null,$value =null,$label = null,$required = null, $type = null)
    {
        $this->name = $name?? '';
        $this->placeholder = $placeholder ?? '';
        $this->value = $value ?? '';
        $this->label = $label ?? '';
        $this->required = $required ?? false;
        $this->type = $type ?? '';
        $this->className = $className;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.input');
    }
}
