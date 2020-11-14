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
     * @param string $title     toast message
     * @param string $icon      info|warning|success|error
     * @param integer $timeout  duration to hide
     * @return void
     */
    public function toast(string $title, string $icon = 'info', int $timeout = 5000)
    {
        $this->emit('swal:toast', compact('title', 'icon', 'timeout'));
    }
}
