<?php

namespace ClearCode\OMDB\IMDb;

use ClearCode\OMDB\Exception\InvalidIMDbArgumentException;

final class Title
{
    private $title;

    public function __construct($title)
    {
        if (!$this->isValid($title)) {
            throw new InvalidIMDbArgumentException("Invalid IMDb ID given.");
        }

        $this->title = $title;
    }

    public static function isValid($title)
    {
        return !empty($title);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function __toString()
    {
        return (string) $this->title;
    }
}
