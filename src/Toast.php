<?php

namespace Akhaled\LivewireSweetalert;

/**
 * Show toast
 */
trait Toast
{
    /**
     * Popup sweet alert toast
     *
     * @param string $titleText     toast message
     * @param string $icon          info|warning|success|error
     * @param integer $timeout      duration to hide
     * @return void
     */
    public function toast(string $titleText, string $icon = 'info', int $timeout = 5000)
    {
        $this->dispatch('swal:toast', compact('titleText', 'icon', 'timeout'));
    }
}
