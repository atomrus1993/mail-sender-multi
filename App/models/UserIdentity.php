<?php

namespace app\models;

use app\Entities\User;
use app\Repositories\UserRepositoryInterface;
use Yii;
use yii\base\BaseObject;
use yii\web\IdentityInterface;

class UserIdentity extends BaseObject implements IdentityInterface
{
    public $id;
    public $username;
    public $password;

    private $user;

    /**
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        parent::__construct();

    }

    private static function getRepository(): UserRepositoryInterface
    {
        return Yii::createObject(UserRepositoryInterface::class);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return new static(static::getRepository()->findById($id));
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null): ?IdentityInterface
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): int
    {
        return $this->user->getId();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey(): ?string
    {
        return null;
    }

    public function getLogin(): string
    {
        return $this->user->login;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): ?bool
    {
        return null;
    }
}
