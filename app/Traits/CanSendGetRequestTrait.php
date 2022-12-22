<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

trait CanSendGetRequestTrait
{
    public function get(PendingRequest $request, string $url, array $params = []): Response
    {
        return $request->get(
            url: $url,
            query: $params
        );
    }
}