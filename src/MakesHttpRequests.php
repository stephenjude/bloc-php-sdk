<?php

namespace Stephenjude\BlocPhpSdk;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Stephenjude\BlocPhpSdk\Exceptions\BadRequestException;
use Stephenjude\BlocPhpSdk\Exceptions\ForbiddenRequestException;
use Stephenjude\BlocPhpSdk\Exceptions\NotFoundException;
use Stephenjude\BlocPhpSdk\Exceptions\TooManyRequestException;
use Stephenjude\BlocPhpSdk\Exceptions\UnauthorizedException;

trait MakesHttpRequests
{
    protected function get(string $uri)
    {
        return $this->request('GET', $uri);
    }

    protected function post(string $uri, array $payload = [])
    {
        return $this->request('POST', $uri, $payload);
    }

    protected function put(string $uri, array $payload = [])
    {
        return $this->request('PUT', $uri, $payload);
    }

    protected function delete(string $uri, array $payload = [])
    {
        return $this->request('DELETE', $uri, $payload);
    }

    protected function request(string $verb, string $uri, array $payload = [])
    {
        $response = $this->client->request(
            $verb,
            $uri,
            empty($payload) ? [] : ['form_params' => $payload]
        );

        if (! $this->isSuccessful($response)) {
            return $this->handleRequestError($response);
        }

        $responseBody = (string)$response->getBody();

        return json_decode($responseBody, true) ?: $responseBody;
    }

    public function isSuccessful($response): bool
    {
        if (! $response) {
            return false;
        }

        return (int)substr($response->getStatusCode(), 0, 1) === 2;
    }

    protected function handleRequestError(ResponseInterface $response): void
    {
        match ($response->getStatusCode()) {
            400 => throw new BadRequestException((string)$response->getBody()),
            401 => throw new UnauthorizedException(),
            403 => throw new ForbiddenRequestException(),
            404 => throw new NotFoundException(),
            429 => throw new TooManyRequestException(),
            default => throw new Exception((string)$response->getBody()),
        };
    }
}
