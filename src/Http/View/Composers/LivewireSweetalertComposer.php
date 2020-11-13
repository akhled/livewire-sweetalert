<?php

namespace Akhaled\LivewireSweetalert\Http\View\Composers;

use Illuminate\View\View;

class LivewireSweetalertComposer
{
    /**
     * Bind javascript to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->factory->startSection('akhaled-livewire-sweetalert-section', 'livewire:sweetalert.js');
        $view->factory->stopSection();
        // $view->with('count', $this->users->count());
    }
}
