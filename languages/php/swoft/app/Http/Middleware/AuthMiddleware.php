<?php


namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Context\Context;
use Swoft\Http\Server\Contract\MiddlewareInterface;

/**
 * @Bean()
 */
class AuthMiddleware implements MiddlewareInterface
{
    /**
     * Process an incoming server request.
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     * @inheritdoc
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // before request handle
        // 判断token
        $token = $request->getHeaderLine("token");
        $type = \config('jwt.type');
        $public = \config('jwt.publicKey');
        try {
            $auth = JWT::decode($token, $public, ['type' => $type]);
            $request->user = $auth->user;
        } catch (\Exception $e) {
            $json = ['code'=>0,'msg'=>'授权失败'];
            $response = Context::mustGet()->getResponse();
            return $response->withData($json);
        }
        $response = $handler->handle($request);
        return $response;
        // after request handle
    }
}
