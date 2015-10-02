<?php

namespace ClearCode\OMDB\IMDb;

use ClearCode\OMDB\Exception\InvalidIMDbArgumentException;

final class Plot
{
    const VERSION_SHORT = 'short';
    const VERSION_FULL = 'full';

    private $version;

    public function __construct($version = self::VERSION_SHORT)
    {
        if (!in_array($version, self::getVersions())) {
            throw new InvalidIMDbArgumentException("Invalid plot version");
        }

        $this->version = $version;
    }

    public static function getVersions()
    {
        return array(
            self::VERSION_FULL,
            self::VERSION_SHORT
        );
    }

    public function getPlot()
    {
        return $this->version;
    }

    public function __toString()
    {
        return (string) $this->version;
    }
}
