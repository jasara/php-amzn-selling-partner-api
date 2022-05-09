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
                    'response_data' => json_encode($this->cleanData($response_data ?: [])),
                    'response_code' => $response->getStatusCode(),
                ]);
            });
        });
    }

    private function parseRequestData(RequestInterface $request): string
    {
        $body = json_decode($request->getBody()->getContents(), true) ?: [];

        $params = explode('&', $request->getUri()->getQuery());
        for ($i = 0; $i < count($params); $i++) {
            $parts = explode('=', $params[$i]);
            if (count($parts) === 2) {
                $params[$i] = [$parts[0] => $parts[1]];
            }
        }

        return json_encode(
            $this->cleanData(
                array_merge($body, $params) ?: []
            ),
        );
    }

    private function cleanData(array $data): array
    {
        $filtered_keys = [
            'x-amz-access-token' => '[filtered]',
            'mwsAuthToken' => '[filtered]',
            'authorizationCode' => '[filtered]',
            'restrictedDataToken' => '[filtered]',
            'access_token' => '[filtered]',
            'refresh_token' => '[filtered]',
        ];

        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = $this->cleanData($value);
            }
        }

        $filtered_data = array_intersect_key($filtered_keys, $data) + $data;

        return $filtered_data;
    }
}
