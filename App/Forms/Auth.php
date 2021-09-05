<?php
/**
 * Created by PhpStorm.
 * User: Matveev.Andrey
 * Date: 05.09.2021
 * Time: 18:53
 */

namespace app\Forms;

use app\Entities\User;
use app\models\UserIdentity;
use app\Repositories\UserRepositoryInterface;
use Yii;
use yii\base\Model;
use yii\db\Expression;

class Auth extends Model
{
    public $username;
    public ?string $password;
    public bool $rememberMe = true;

    private UserRepositoryInterface $repository;
    private ?User $user;

    public function __construct(UserRepositoryInterface $repository, $config = [])
    {
        $this->repository = $repository;
        parent::__construct($config);
    }

    public function rules(): array
    {
        return [
            [['username', 'password'], 'string'],
            [['username', 'password'], 'trim'],
            ['username', 'filter', 'filter' => 'strtolower'],
            [['username', 'password'], 'required'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->user = $this->repository->findByLogin(
                $this->username
            ); // получаем пользователя для дальнейшего сравнения пароля

            if (!$this->user || !$this->checkPassword($this->password)) {
                //если мы НЕ нашли в базе такого пользователя
                //или введенный пароль и пароль пользователя в базе НЕ равны ТО,
                $this->addError($attribute, 'Пароль или логин введены неверно');
            }
        }
    }

    public function login()
    {
        \Yii::$app->user->login(new UserIdentity($this->user));
        $this->UpdateLastLogin($this->user);
    }

    /**
     * Обновляем дату последней авторизации + проверка на auth key
     *
     */
    private function UpdateLastLogin(User $user)
    {
        $user->updateAttributes(['last_login' => new Expression('NOW()')]);
    }

    private function checkPassword(string $currentPassword): bool
    {
        return \Yii::$app->getSecurity()->validatePassword($currentPassword, $this->user->hash);
    }
}
