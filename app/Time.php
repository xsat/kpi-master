<?php

namespace App;

/**
 * Class Time
 *
 * @package App
 */
class Time implements TimeInterface
{
    /**
     * @var int
     */
    protected $hours;

    /**
     * @var int
     */
    protected $minutes;

    /**
     * Time constructor.
     *
     * @param int|null $hours
     * @param int|null $minutes
     */
    public function __construct(?int $hours, ?int $minutes)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;

        $this->calculate();
    }

    private function calculate(): void
    {
        if ($this->hours !== null && $this->hours < 0) {
            $this->hours = 0;
        }

        if ($this->minutes !== null && $this->minutes < 0) {
            $this->minutes = 0;
        } elseif ($this->minutes !== null && $this->minutes > 60) {
            $plus_hours = floor($this->minutes / 60);
            $this->hours += $plus_hours;
            $this->minutes = $this->minutes - $plus_hours * 60;
        }
    }

    /**
     * @return int|null
     */
    public function getHours(): ?int
    {
        return $this->hours ?? 0;
    }

    /**
     * @return int|null
     */
    public function getMinutes(): ?int
    {
        return $this->minutes ?? 0;
    }
}
