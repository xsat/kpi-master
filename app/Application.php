<?php

namespace App;

/**
 * Class Application
 *
 * @package App
 */
class Application extends Time implements KpiInterface
{
    /**
     * @var int
     */
    private $percent;

    /**
     * @var bool
     */
    private $result = false;

    /**
     * @var Time
     */
    private $minTime;

    /**
     * @var Time
     */
    private $maxTime;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        parent::__construct(
            isset($_GET['hours']) ? (int)$_GET['hours'] : null,
            isset($_GET['minutes']) ? (int)$_GET['minutes'] : null
        );

        if (isset($_GET['percent'])) {
            $this->percent = (int)$_GET['percent'];
        } else {
            $this->percent = $_SERVER['DEFAULT_PERCENT'] ?? 20;
        }

        if ($this->percent < 0) {
            $this->percent = 0;
        } elseif ($this->percent > 100) {
            $this->percent = 100;
        }

        if ($this->hours || $this->minutes) {
            $this->result = true;
            $this->calculate();
        }
    }

    private function calculate(): void
    {
        $minutes = $this->minutes + ($this->hours * 60);
        $percent_minutes = round($minutes * $this->percent / 100);
        $this->minTime = new Time(0, $minutes - $percent_minutes);
        $this->maxTime = new Time(0, $minutes + $percent_minutes);
    }

    /**
     * @return string
     */
    public function show(): string
    {
        ob_start();

        include_once __DIR__ .
            DIRECTORY_SEPARATOR . 'Views' .
            DIRECTORY_SEPARATOR . 'index.phtml';

        return ob_get_clean();
    }

    /**
     * @return int|null
     */
    public function getPercent(): ?int
    {
        return $this->percent;
    }

    /**
     * @return bool
     */
    public function isResult(): bool
    {
        return $this->result;
    }

    /**
     * @return TimeInterface
     */
    public function getMinTime(): TimeInterface
    {
        return $this->minTime ?? new Time(0, 0);
    }

    /**
     * @return TimeInterface
     */
    public function getMaxTime(): TimeInterface
    {
        return $this->maxTime ?? new Time(0, 0);
    }
}
