<?php

namespace Components;

use Illuminate\Container\Container;
use Illuminate\View\Component;

class CollapseComponent extends Component
{
    public $title;
    public $slug;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $slug)
    {
        $this->title = $title;
        $this->slug = $slug;
    }

    public function json($slug)
    {
        return json_encode(json_decode(file_get_contents(__DIR__.'/../source/_data/'.$this->slug.'.json')), JSON_PRETTY_PRINT);
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
            ->make('_components.collapse');
    }
}
