<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class BiospServiceCard extends Component
{
    public string $name;
    public Collection $services;

    /**
     * @param string|null $name
     * @param Collection|array|null $services
     */
    public function __construct(string|null $name , Collection|array|null $services)
    {
        $this->name = $name ?? '';
        $this->services = $services ?? [];
    }

    public function render(): View
    {
        return view('components.biosp-service-card');
    }
}
