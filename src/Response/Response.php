<?php

namespace ClearCode\OMDB\Response;

/**
 * Class Response
 * @package ClearCode\OMDB\Response
 * @method getTitle
 * @method getYear
 * @method getRated
 * @method getReleased
 * @method getRuntime
 * @method getGenre
 * @method getDirector
 * @method getWriter
 * @method getActors
 * @method getPlot
 * @method getLanguage
 * @method getCountry
 * @method getAwards
 * @method getPoster
 * @method getMetascore
 * @method getImdbRating
 * @method getImdbID
 * @method getImdbVotes
 * @method getType
 * @method getResponse
 */
class Response
{
    protected $data;

    public function __construct($response)
    {
        $this->data = array();
        $this->parseResponse($response);
    }

    public function __call($name, $arguments = null)
    {
        list(,$propertyName) = explode('get', $name);

        if ($propertyName) {
            return $this->data[lcfirst($propertyName)];
        }

        return null;
    }

    protected function parseResponse($response)
    {
        foreach ($response as $property => $value) {
            $propertyName = lcfirst($property);
            $this->data[$propertyName] = $value;
        }
    }

    public function toArray()
    {
        return $this->data;
    }
}