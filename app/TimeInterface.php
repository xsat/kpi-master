<?php

namespace App;

/**
 * Interface TimeInterface
 *
 * @package App
 */
interface TimeInterface
{
    /**
     * @return int|null
     */
    public function getHours(): ?int;

    /**
     * @return int|null
     */
    public function getMinutes(): ?int;
}
