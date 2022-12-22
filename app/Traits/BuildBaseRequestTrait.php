<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

trait BuildBaseRequestTrait
{
    public function buildRequestWithToken(): PendingRequest
    {
        return $this->withBaseUrl()->timeout(
            seconds: 15,
        )->withToken(
            token: $this->apiToken,
        );
    }

    public function buildRequestWithDigestAuth(): PendingRequest
    {
        return $this->withBaseUrl()->timeout(
            seconds: 15,
        )->withDigestAuth(
            username: $this->username,
            password: $this->password,
        );
    }

    public function buildRequestWithUrl(): PendingRequest
    {
        return $this->withBaseUrl()->withOptions([
            'query' => [
                'appid' => $this->apiToken
            ]
        ]);
    }

    public function withBaseUrl(): PendingRequest
    {
        return Http::baseUrl(
            url: $this->baseUrl,
        );
    }
}