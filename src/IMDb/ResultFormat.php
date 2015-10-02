<?php

namespace ClearCode\OMDB\IMDb;

use ClearCode\OMDB\Exception\InvalidIMDbArgumentException;

final class ResultFormat
{
    const FORMAT_JSON = 'json';
    const FORMAT_XML = 'xml';

    private $format;

    public function __construct($type)
    {
        if (!$this->isValid($type)) {
            throw new InvalidIMDbArgumentException();
        }

        $this->format = $type;
    }

    public function getFormat()
    {
        return $this->format;
    }

    public static function getSupportedFormats()
    {
        return array(
            self::FORMAT_JSON,
            self::FORMAT_XML,
        );
    }

    public static function isValid($type)
    {
        return in_array($type, self::getSupportedFormats());
    }
}