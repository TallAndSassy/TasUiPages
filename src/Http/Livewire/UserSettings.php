<?php

namespace TallAndSassy\TasUiPages\Http\Livewire;

use Livewire\Component;

class UserSettings extends Component
{
    /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-dropdown' => '$refresh',
    ];

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('tassy::livewire/user-settings');
    }
}
