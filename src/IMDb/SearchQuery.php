<?php

namespace ClearCode\OMDB\IMDb;

use ClearCode\OMDB\Exception\InvalidIMDbArgumentException;

final class SearchQuery
{
    private $query;

    public function __construct($query)
    {
        if (!$this->isValid($query)) {
            throw new InvalidIMDbArgumentException("Invalid IMDb ID given.");
        }

        $this->query = $query;
    }

    public static function isValid($query)
    {
        return !empty($query);
    }

    public function getQuery()
    {
        return $this->query;
    }

    public function __toString()
    {
        return (string) $this->query;
    }
}
