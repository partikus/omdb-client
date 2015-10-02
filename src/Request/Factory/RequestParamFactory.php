<?php

namespace ClearCode\OMDB\Request\Factory;

use ClearCode\OMDB\Exception\InvalidIMDbArgumentException;
use ClearCode\OMDB\Request\Request;
use ClearCode\OMDB\Request\RequestById;
use ClearCode\OMDB\Request\RequestByTitle;

class RequestParamFactory implements RequestParamFactoryInterface
{
    public function buildParams(Request $request)
    {
        switch ($request->getRequestType()) {
            case Request::REQUEST_TYPE_SEARCH:
                return $this->buildSearchParams($request);
                break;
            case Request::REQUEST_TYPE_BY_ID:
                return $this->buildByIdParams($request);
                break;
            case Request::REQUEST_TYPE_BY_TITLE:
                return $this->buildByTitleParams($request);
                break;
            default:
                throw new InvalidIMDbArgumentException('Invalid request type GIVEN');
        }
    }

    protected function buildSearchParams(Request $request)
    {
        return array(
            's' => $request->getId(),
            'type' => $request->getType(),
            'y' => $request->getYear(),
            'r' => $request->getResultType(),
            'v' => $request->getApiVersion(),
        );
    }

    protected function buildByIdParams(RequestById $request)
    {
        return array(
            'i' => $request->getId(),
            'type' => $request->getType(),
            'y' => $request->getYear(),
            'plot' => $request->getPlot(),
            'r' => $request->getResultType(),
            'tomatoas' => $request->getRottenTomatoes(),
            'v' => $request->getApiVersion(),
        );
    }

    protected function buildByTitleParams(RequestByTitle $request)
    {
        return array(
            't' => $request->getId(),
            'type' => $request->getType(),
            'y' => $request->getYear(),
            'plot' => $request->getPlot(),
            'r' => $request->getResultType(),
            'tomatoas' => $request->getRottenTomatoes(),
            'v' => $request->getApiVersion(),
        );
    }
}
