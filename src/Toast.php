<?php

/**
 * Show toast
 */
trait Toast
{
    /**
     * Popup sweet alert toast
     *
     * @param array $options
     * @return void
     */
    public function toast($options = [])
    {
        $options = array_merge([
            'type'    => 'success',
            'title'   => 'This is a success alert!!',
            'timeout' => 10000
        ], $options);

        $this->emit('swal:toast', $options);
    }
}
