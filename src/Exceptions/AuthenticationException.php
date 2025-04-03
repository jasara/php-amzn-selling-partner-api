<?php

namespace Jasara\AmznSPA\Exceptions;

use Closure;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Jasara\AmznSPA\Constants\JasaraNotes;

class AuthenticationException extends AmznSPAException
{
    public function __construct(?Response $response = null, ?Closure $callback = null)
    {
        $message = $response ? $this->getMessageFromResponse($response) : '';

        if ($jasara_notes = JasaraNotes::findNote(Str::of($message)->before(':'))) {
            $message .= ' Additional Notes: ' . $jasara_notes;
        }

        if ($callback) {
            $callback($response, $message);
        }

        parent::__construct($message);
    }

    private function getMessageFromResponse(Response $response): string
    {
        $message = '';

        $data = $response->json();

        if (array_key_exists('error', $data)) {
            $message .= 'Error: ' . $data['error'];
        }
        if (array_key_exists('error_description', $data)) {
            $message .= ' Description: ' . $data['error_description'];
        }
        if ($errors_message = Arr::get($data, 'errors.0.message')) {
            $message = $errors_message;
        }

        return $message;
    }
}
