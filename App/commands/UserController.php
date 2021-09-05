<?php
/**
 * Created by PhpStorm.
 * User: Matveev.Andrey
 * Date: 05.09.2021
 * Time: 20:51
 */

namespace app\commands;

use app\Entities\User;
use Yii;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\Console;

class UserController extends Controller
{
    /**
     * @param string $login
     * @param string $password
     */
    public function actionAdd(string $login, string $password)
    {
        $user = $this->create($login, $password);

        if ($user->save()) {
            return $this->stdout("Пользователь создан: $login:$password", Console::FG_PURPLE) . $this->stdout(PHP_EOL);
        }


        $this->stdout($user->getFirstErrors()[array_key_first($user->getFirstErrors())], Console::FG_RED)  . $this->stdout(PHP_EOL);
        return ExitCode::OK;
    }

    /**
     * @param $login
     * @param $password
     *
     * @return User
     * @throws \yii\base\Exception
     */
    private function create($login, $password): User
    {
        $user = new User;
        $user->login = $login;
        $user->hash = Yii::$app->getSecurity()->generatePasswordHash($password);

        return $user;
    }
}
