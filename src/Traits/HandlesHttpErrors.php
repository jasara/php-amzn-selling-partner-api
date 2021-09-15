<?php

namespace Jasara\AmznSPA\Traits;

use Illuminate\Http\Client\Response;
use Jasara\AmznSPA\Exceptions\AuthenticationException;

trait HandlesHttpErrors
{
    private function handleError(Response $response)
    {
        $handler = 'handle' . $response->status();
        if (! method_exists($this, $handler)) {
            return $response->throw();
        }

        $data = $response->json();

        if (! array_key_exists('error', $data)) {
            return $response->throw();
        }
        if (! array_key_exists('error_description', $data)) {
            return $response->throw();
        }

        return $this->$handler($data['error'], $data['error_description']);
    }

    private function handle401(string $error, string $error_description)
    {
        throw new AuthenticationException('Error: "' . $error . '", Description: "' . $error_description . '"');
    }
}
