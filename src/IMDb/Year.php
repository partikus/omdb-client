<?php

namespace ClearCode\OMDB\IMDb;

final class Year
{
    private $year;

    public function __construct($year = null)
    {
        $this->year = $year;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function __toString()
    {
        return (string) $this->year;
    }
}
