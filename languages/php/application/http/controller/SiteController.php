<?php

namespace Application\Http\controllers;

use framework\src\Sf;
use framework\src\web\Controller;

class SiteController extends Controller
{
    public function actionTest()
    {
        $user = \Application\services\models\User::findAll();
        $data = ['code' => 200, 'msg' => 'Success', 'data' => $user];
        echo $this->toJson($data);
    }

    public function actionView()
    {
        $body = 'Test Body infomation ';
        return $this->render('site/view', ['body' => $body, 'users' => [1, 2]]);
    }

    public function actionCache()
    {
        $cache = Sf::createObject('cache');
        $cache->set('tests', 'Just a filecache tests');
        echo 'FileCache store:' . '</br>';

        $rs = $cache->get('tests');
        $cache->flush();

        echo $rs;
    }

    public function actionRds()
    {
        $cache = Sf::createObject('redis');
        $cache->set('tests', 'Just a redisCache tests');
        echo 'RedisCache store:' . '</br>';

        $rs = $cache->get('tests');
        $cache->flush();

        echo $rs;
    }
}
