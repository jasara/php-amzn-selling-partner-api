<?php

namespace Jasara\AmznSPA;

use Illuminate\Http\Client\Events\ResponseReceived;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\Response;
use Jasara\AmznSPA\Exceptions\AuthenticationException;

class HttpEventHandler extends SimpleDispatcher
{
    public function dispatch($event, $payload = [], $halt = false)
    {
        /** @var Request $request */
        $request = $event->request;

        if (get_class($event) === ResponseReceived::class) {
            /** @var Response $response */
            $response = $event->response;

            /* ray($request->data());
            ray($request->body());
            ray($response->body()); */

            if ($response->failed()) {
                $this->handleError($response);
            }
        }
    }

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
