<?php

namespace Spatie\ResponseCache\Events;

use Illuminate\Http\Request;

class ResponseCacheHit
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
