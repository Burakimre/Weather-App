<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;

trait CanSendPostRequestTrait
{
    public function post(PendingRequest $request, string $url, array $payload = []): Response
    {
        return $request->post(
            url: $url,
            data: $payload,
        );
    }
}