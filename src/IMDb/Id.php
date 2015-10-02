<?php

namespace ClearCode\OMDB\IMDb;

use ClearCode\OMDB\Exception\InvalidIMDbArgumentException;

final class Id
{
    private $id;

    public function __construct($id)
    {
        if (!$this->isValid($id)) {
            throw new InvalidIMDbArgumentException("Invalid IMDb ID given.");
        }

        $this->id = $id;
    }

    public static function isValid($id)
    {
        return preg_match("/tt\\d{7}/", $id) > 0;
    }

    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return (string) $this->id;
    }
}
