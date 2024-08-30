<?php

namespace Spatie\ResponseCache\Hasher;

use Illuminate\Http\Request;
use Spatie\ResponseCache\CacheProfiles\CacheProfile;

class DefaultHasher implements RequestHasher
{
    protected CacheProfile $cacheProfile;

    public function __construct(CacheProfile $cacheProfile)
    {
        $this->cacheProfile = $cacheProfile;
    }

    public function getHashFor(Request $request): string
    {
        $cacheNameSuffix = $this->getCacheNameSuffix($request);

        return 'responsecache-' . hash(
            'md5',
            "{$request->getHost()}-{$this->getNormalizedRequestUri($request)}-{$request->getMethod()}/$cacheNameSuffix"
        );
    }
}
