<?php


namespace App\Http\Controller;

use App\Http\Middleware\ApiMiddleware;
use App\Http\Middleware\IndexMiddleware;
use App\Http\Middleware\ControllerMiddleware;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Http\Server\Annotation\Mapping\Middlewares;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;

/**
 * @Controller()
 * @Middlewares({
 *      @Middleware(ApiMiddleware::class),
 *      @Middleware(ControllerMiddleware::class)
 * })
 */
class MiddlewareController
{
    /**
     * @RequestMapping()
     * @Middleware(IndexMiddleware::class)
     */
    public function index(){
        return "MiddlewareController";
    }
}
