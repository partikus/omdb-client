<?php

namespace ClearCode\OMDB\Request;

interface Request
{
    const REQUEST_TYPE_BY_ID = 'by_id';
    const REQUEST_TYPE_BY_TITLE = 'by_title';
    const REQUEST_TYPE_SEARCH = 'search';

    public function getId();
    public function getType();
    public function getYear();
    public function getPlot();
    public function getResultType();
    public function getApiVersion();
    public function getRequestType();
}
