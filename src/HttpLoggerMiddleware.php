<?php

namespace Jasara\AmznSPA;

use GuzzleHttp\Middleware;
use GuzzleHttp\Promise\PromiseInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class HttpLoggerMiddleware
{
    public function __construct(
        private LoggerInterface $logger
    ) {
    }

    public function buildCallable(): callable
    {
        return Middleware::tap(after: function (RequestInterface $request, array $options, PromiseInterface $response) {
            $response->then(function (ResponseInterface $response) use ($request) {
                $request_url = (string) $request->getUri();
                // Remove url parameters so URL displays cleanly in logs
                $url = substr($request_url, 0, (strrpos($request_url, '?') ?: strlen($request_url)));

                $response_data = json_decode($response->getBody()->getContents(), true);

                $this->logger->debug('[AmznSPA] Request ' . $request->getMethod() . ' ' . $url, [
                    'unsigned_request_headers' => $this->cleanData($request->getHeaders()),
                    'request_data' => $this->parseRequestData($request),
                    'response_headers' => $this->cleanData($response->getHeaders()),
                    'response_data' => $this->cleanData($response_data ?: []),
                    'response_code' => $response->getStatusCode(),
                ]);
            });
        });
    }

    private function parseRequestData(RequestInterface $request): array
    {
        $body = $request->getBody();
        $body->rewind();
        $body = json_decode($body->getContents(), true) ?: [];

        $params = explode('&', $request->getUri()->getQuery());
        for ($i = 0; $i < count($params); $i++) {
            $parts = explode('=', $params[$i]);
            if (count($parts) === 2) {
                $params[$i] = [
                    $parts[0] => str_replace('%2C', ',', $parts[1]),
                ];
            }
        }

        $params = array_filter($params);

        return
            $this->cleanData(
                array_merge($body, $params) ?: []
            );
    }

    private function cleanData(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->cleanData($value);
            }

            if ($this->shouldFilterKey($key)) {
                $data[$key] = '[filtered]';
            }
        }

        return $data;
    }

    private function shouldFilterKey(string $key): bool
    {
        $key = strtolower($key);

        $filtered_keys = ['authorizationcode', 'buyeremail', 'buyername', 'buyercounty', 'buyertaxinfo', 'addressline1', 'addressline2', 'phone'];

        if (str_contains($key, 'secret')) {
            return true;
        }
        if (str_contains($key, 'token')) {
            return true;
        }
        if (in_array($key, $filtered_keys)) {
            return true;
        }

        return false;
    }
}
