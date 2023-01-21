<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;
use Symfony\Component\Uid\Ulid;

class BiospServiceCard extends Component
{
    public string $name;

    public Collection $services;

    public Collection $selectedServices;

    public String $keyCardComponent;

    public String|null $route;

    public String|null $method;

    public string $serviceName;

    /**
     * @param  string|null  $name
     * @param  Collection|array|null  $services
     */
    public function __construct(
        string|null $name,
        Collection|array|null $services = null,
        Collection|array|null $selectedServices = null,
        ?string $route = null, ?string $method = null,
        string $serviceName = ''
    ) {
        $this->name = $name ?? '';
        $this->services = $services ?? collect();
        $this->selectedServices = $selectedServices ?? collect();
        $this->keyCardComponent = 'M'.Ulid::generate();
        $this->method = $method;
        $this->route = $route;
        $this->serviceName = $serviceName;
    }

    public function render(): View
    {
        return view('components.biosp-service-card');
    }
}
