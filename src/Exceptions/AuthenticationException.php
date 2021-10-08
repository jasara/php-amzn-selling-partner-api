<?php

namespace Jasara\AmznSPA\Exceptions;

use Closure;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;

class AuthenticationException extends AmznSPAException
{
    public function __construct(Response $response = null, ?Closure $callback = null)
    {
        if ($callback) {
            $callback($response);
        }

        $message = $response ? $this->getMessageFromResponse($response) : '';

        parent::__construct($message);
    }

    private function getMessageFromResponse(Response $response): string
    {
        $message = '';

        $data = $response->json();

        if (array_key_exists('error', $data)) {
            $message .= 'Error: '.$data['error'];
        }
        if (array_key_exists('error_description', $data)) {
            $message .= 'Description: '.$data['error_description'];
        }
        if ($errors_message = Arr::get($data, 'errors.0.message')) {
            $message = $errors_message;
        }

        return $message;
    }
}
