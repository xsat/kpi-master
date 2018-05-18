<?php

namespace App;

/**
 * Interface KpiInterface
 *
 * @package App
 */
interface KpiInterface extends TimeInterface
{
    /**
     * @return int|null
     */
    public function getPercent(): ?int;

    /**
     * @return bool
     */
    public function isResult(): bool;

    /**
     * @return TimeInterface
     */
    public function getMinTime(): TimeInterface;

    /**
     * @return TimeInterface
     */
    public function getMaxTime(): TimeInterface;
}
