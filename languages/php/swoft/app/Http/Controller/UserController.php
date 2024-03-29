<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link https://swoft.org
 * @document https://swoft.org/docs
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use GuzzleHttp\Psr7\Request;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Http\Server\Annotation\Mapping\RequestMethod;
// use Swoft\Http\Message\Response;

/**
 * Class UserController
 *
 * @Controller(prefix="/users")
 * @package App\Http\Controller
 */
class UserController{
    /**
     * Get data list. access uri path: /users
     * @RequestMapping(route="/users", method=RequestMethod::GET)
     * @return array
     */
    public function index(): array
    {
        $response = context()->getResponse();
        $data = ['name'=>'Swoft2.0'];

        return (array)$response->withData($data);
    }

    /**
     * Get one by ID. access uri path: /users/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::GET)
     * @return array
     */
    public function get(): array
    {
        $request = context()->getRequest();

        return $request->getHeaders();
    }

    /**
     * Create a new record. access uri path: /users
     * @RequestMapping(route="/users", method=RequestMethod::POST)
     * @return array
     */
    public function post(): array
    {
        return ['id' => 2];
    }

    /**
     * Update one by ID. access uri path: /users/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::PUT)
     * @return array
     */
    public function put(): array
    {
        return ['id' => 1];
    }

    /**
     * Delete one by ID. access uri path: /users/{id}
     * @RequestMapping(route="{id}", method=RequestMethod::DELETE)
     * @return array
     */
    public function del(): array
    {
        return ['id' => 1];
    }
}
