<?php

namespace Akhaled\LivewireSweetalert;

/**
 * Confirm message
 */
trait Confirm
{
    /**
     * Popup sweet alert confirm
     *
     * @param string $title     toast message
     * @param string $html
     * @param string $options
     * @return void
     */
    public function confirm(string $title, string $html = "You can't revert this", array $options = [])
    {
        $options = array_merge([
            'event' => "confirmed",
            'icon' => 'warning',
            'showCancelButton' => 'true',
            // 'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'confirmButtonText' => 'Yes',
            'reverseButtons' => 'true',
        ], $options);

        $options['title'] = $title;
        $options['html'] = $html;

        $this->emit('swal:confirm', compact('options'));
    }
}