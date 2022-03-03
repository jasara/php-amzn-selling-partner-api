<?php

namespace Jasara\AmznSPA\Exceptions;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;

class GrantlessAuthenticationException extends AmznSPAException
{
    public function __construct(public ?Response $response = null)
    {
        $message = $response ? $this->getMessageFromResponse($response) : 'Grantless authentication error';

        parent::__construct($message);
    }

    private function getMessageFromResponse(Response $response): string
    {
        $message = '';

        $data = $response->json();

        if ($errors_message = Arr::get($data, 'errors.0.message')) {
            $message = $errors_message;
        }

        return $message;
    }
}
