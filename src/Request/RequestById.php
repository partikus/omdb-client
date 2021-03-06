<?php

namespace ClearCode\OMDB\Request;

use ClearCode\OMDB\IMDb;

class RequestById implements Request
{
    const API_VERSION = '1';

    public function __construct(
        IMDb\Id $id, IMDb\SearchType $searchType = null,
        IMDb\Plot $plot = null, IMDb\ResultFormat $format = null,
        IMDb\Year $year = null,
        $rottenTomatoes = false, $apiVersion = self::API_VERSION
    ) {
        $this->id = $id;
        $this->searchType = $searchType;
        $this->plot = $plot;
        $this->format = $format;
        $this->year = $year;
        $this->rottenTomatoes = $rottenTomatoes;
        $this->apiVersion = $apiVersion;
    }

    public function getId()
    {
        return (string) $this->id;
    }

    public function getType()
    {
        return (string) $this->searchType;
    }

    public function getYear()
    {
        return (string) $this->year;
    }

    public function getPlot()
    {
        return (string) $this->plot;
    }

    public function getResultType()
    {
        return (string) $this->format;
    }

    public function getRottenTomatoes()
    {
        return (string) $this->rottenTomatoes;
    }

    public function getApiVersion()
    {
        return self::API_VERSION;
    }

    public function getRequestType()
    {
        return Request::REQUEST_TYPE_BY_ID;
    }
}
