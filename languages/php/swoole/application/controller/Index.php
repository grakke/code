<?php

namespace controller;

use Family\MVC\Controller;
use Family\Pool\Context;
use service\User as UserService;

class Index extends Controller
{
    public function index()
    {
        $context = Context::getContext();
        $request = $context->getRequest();
        return 'i am family by route!'.json_encode($request->get);
    }

    public function tong()
    {
        return 'i am tong ge';
    }


    /**
     * @return false|string
     * @throws \Exception
     * @desc 返回一个用户信息
     */
    public function user()
    {
        if (empty($this->request->get['uid'])) {
            throw new \Exception("uid 不能为空 ");
        }
        $result = UserService::getInstance()->getUserInfoByUId($this->request->get['uid']);
        return json_encode($result);
    }

    /**
     * @return false|string
     * @desc 返回用户列表
     */
    public function list()
    {
        $result = UserService::getInstance()->getUserInfoList();
        return json_encode($result);
    }

    /**
     * @return bool
     * @desc 添加用户
     */
    public function add()
    {
        $array = [
            'name' => $this->request->get['name'],
            'password' => $this->request->get['password'],
        ];

        return UserService::getInstance()->add($array);
    }

    /**
     * @return bool
     * @throws \Exception
     * @desc 更新用户信息
     */
    public function update()
    {
        $array = [
            'name' => $this->request->get['name'],
            'password' => $this->request->get['password'],
        ];
        $id = $this->request->get['id'];
        return UserService::getInstance()->updateById($array, $id);
    }

    /**
     * @return mixed
     * @throws \Exception
     * @desc 删除用户信息
     */
    public function delete()
    {
        $id = $this->request->get['id'];
        return UserService::getInstance()->deleteById($id);
    }
}

// http://127.0.0.1:9501/Index/add?name=shenzhe5&password=555
// http://127.0.0.1:9501/Index/list
// http://127.0.0.1:9501/Index/update?name=shenzhe0&password=555&id=5
// http://127.0.0.1:9501/Index/delete?id=5
