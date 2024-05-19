<?php

namespace Akhaled\LivewireSweetalert;

/**
 * Show fire
 */
trait Fire
{
    /**
     * Popup sweetalert modal
     *
     * @param string $titleText fire message
     * @param string $icon      info|warning|success|error
     * @param string $html      html text as subtitle
     * @param array $options    extra sweetalert options
     * @return void
     */
    public function fire(string $titleText, string $icon = null, $html = null, $options = [])
    {
        $this->dispatch('swal:fire', array_merge(compact('titleText', 'icon', 'html'), $options));
    }
}
