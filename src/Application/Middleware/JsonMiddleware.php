<?php

declare(strict_types=1);

namespace App\Application\Middleware;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Slim\Psr7\Response as SlimResponse;

class JsonMiddleware
{
    public function __invoke(Request $request, Handler $handler): Response
    {
        $method = $request->getMethod();
        $contentType = $request->getHeaderLine('Content-Type');

        if (in_array($method, ['POST', 'PUT', 'PATCH'], true)) {
            if (strpos($contentType, 'application/json') === false) {
                $response = new SlimResponse();
                $response->getBody()->write(json_encode([
                    'error' => 'Unsupported Media Type. Only application/json is allowed for this method.'
                ], JSON_UNESCAPED_UNICODE));

                return $response->withStatus(415)
                                ->withHeader('Content-Type', 'application/json');
            }
        }

        return $handler->handle($request);
    }
}