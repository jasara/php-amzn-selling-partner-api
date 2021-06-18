<?php

namespace Components;

use Illuminate\Container\Container;
use Illuminate\View\Component;

class ApiActionComponent extends Component
{
    public $method;
    public $endpoint;
    public $parameters;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $method, string $endpoint, string $parameters = null)
    {
        $this->method = $method;
        $this->endpoint = $endpoint;
        $this->parameters = $parameters;
    }

    public function badgeColour()
    {
        switch (strtolower($this->method)) {
            case 'get':
                return 'green';
            case 'post':
                return 'blue';
            case 'put':
                return 'yellow';
            case 'delete':
                return 'red';
            default:
                return 'blue';
        }
    }

    public function parametersArray(): array
    {
        if (! $this->parameters) {
            return [];
        }

        return json_decode(file_get_contents(__DIR__ . '/../source/_data/parameters/' . $this->parameters . '.json'), true);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return Container::getInstance()
            ->make('view')
            ->make('_components.api-action');
    }
}
