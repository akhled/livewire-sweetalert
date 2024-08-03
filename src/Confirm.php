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
     * @param string        $title
     * @param string        $html
     * @param array        $options
     * @param string|null  $event
     * @param array        $data
     * @return void
     */
    public function confirm(
        string $title,
        string $html = "You can't revert this",
        array $options = [],
        ?string $event = null,
        array $data = [],
    ): void {
        $options = array_merge([
            'title' => $title,
            'html' => $html,
            'event' => $event ?? "confirmed",
            'icon' => 'warning',
            'showCancelButton' => 'true',
            // 'confirmButtonColor' => '#3085d6',
            'cancelButtonColor' => '#d33',
            'confirmButtonText' => 'Yes',
            'reverseButtons' => 'true',
            'data' => $data,
        ], $options);

        $this->dispatch('swal:confirm', compact('options'));
    }
}
