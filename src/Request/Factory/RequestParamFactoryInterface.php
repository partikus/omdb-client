<?php

namespace ClearCode\OMDB\Request\Factory;

use ClearCode\OMDB\Request\Request;

interface RequestParamFactoryInterface
{
    public function buildParams(Request $request);
}
