<?php

namespace ClearCode\OMDB\IMDb;

use ClearCode\OMDB\Exception\InvalidIMDbArgumentException;

final class SearchType
{
    const TYPE_MOVIE = 'movie';
    const TYPE_SERIES = 'series';
    const TYPE_EPISODE = 'episode';

    private $type;

    public function __construct($type)
    {
        if (!$this->isValid($type)) {
            throw new InvalidIMDbArgumentException();
        }

        $this->type = $type;
    }

    public function __toString()
    {
        return (string) $this->type;
    }


    public function getType()
    {
        return $this->type;
    }
    public static function getTypes()
    {
        return array(
            self::TYPE_MOVIE,
            self::TYPE_SERIES,
            self::TYPE_EPISODE,
        );
    }

    public static function isValid($type)
    {
        return in_array($type, self::getTypes());
    }
}
