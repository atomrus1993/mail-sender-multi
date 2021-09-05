<?php
/**
 * Created by PhpStorm.
 * User: Matveev.Andrey
 * Date: 05.09.2021
 * Time: 19:03
 */
$container = Yii::$container;

$container->set(\app\Repositories\UserRepositoryInterface::class, \app\Repositories\UserRepository::class);
