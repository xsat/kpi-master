<?php

namespace App;

/**
 * Class Application
 *
 * @package App
 */
class Application
{
    /**
     * @return string
     */
    public function show(): string
    {
        return include_once __DIR__ .
            DIRECTORY_SEPARATOR . 'Views' .
            DIRECTORY_SEPARATOR . 'index.phtml';
    }
}
